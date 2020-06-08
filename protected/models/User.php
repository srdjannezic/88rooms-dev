<?php

class User extends CActiveRecord {

    /**
     * The followings are the available columns in table 'tbl_user':
     * @var integer $id
     * @var string $username
     * @var string $password
     * @var string $email
     * @var string $profile
     */
    public $password_repeat;
    public $new_password;
    public $new_password_repeat;
    public $_assignments;
    public $role;
    /**
     * Returns the static model of the specified AR class.
     * @return CActiveRecord the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'backend_user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('username,first_name, last_name, email', 'required'),
            array('password, password_repeat', 'required', 'on' => 'insert'),
            array('username, password,first_name, last_name', 'length', 'max' => 128),
            array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u', 'message' => __("Korisničko ime može sadržati samo slova i brojeve i crtice.")),
            array('username', 'unique'),
            array('telephone', 'length', 'max' => 15),
            array('email', 'length', 'max' => 50),
            array('password_repeat', 'compare', 'compareAttribute' => 'password', 'on' => 'insert'),
            array('new_password, new_password_repeat', 'required', 'on' => 'updatePassword'),
            array('new_password', 'compare', 'compareAttribute' => 'new_password_repeat', 'on' => 'update,updatePassword'),
            array('password_repeat, password, new_password,new_password_repeat', 'safe'),
            array('id, username, first_name, last_name, telephone, email, role', 'safe', 'on' => 'search'),
        );
    }

    public function checkUsername($attribute) {

        $record = User::model()->findByAttributes(array('username' => $attribute));

        if (empty($record)) {
            $this->addError($attribute, __('User already exists.'));
        }
    }

    public function afterFind() {
        $this->_assignments = $this->assignments;
        parent::afterFind();
    }

    public function getUnassignedRoles() {
        return(Helper::getUserNotAssignedRoles($this->id));
    }

    public function afterValidate() {

        if (!$this->isNewRecord) {
            if ($this->new_password != '') {
                $this->password = md5($this->new_password);
            }
        }

        if ($this->isNewRecord) {
            $this->password = md5($this->password);
        }

        parent::afterValidate();
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'assignments' => array(self::HAS_MANY, 'Assignments', 'userid'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'new_password' => 'New password',
            'new_password_repeat' => 'New password repeat',
            'password_repeat' => 'Password repeat',
            'status' => 'Status',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'telephone' => 'Telephone',
            'email' => 'Email',
        );
    }

    /**
     * Checks if the given password is correct.
     * @param string the password to be validated
     * @return boolean whether the password is valid
     */
    public function validatePassword($password) {
        return crypt($password, $this->password) === $this->password;
    }

    /**
     * Generates the password hash.
     * @param string password
     * @return string hash
     */
    public function hashPassword($password) {
        return crypt($password, $this->generateSalt());
    }

    /**
     * Generates a salt that can be used to generate a password hash.
     *
     * The {@link http://php.net/manual/en/function.crypt.php PHP `crypt()` built-in function}
     * requires, for the Blowfish hash algorithm, a salt string in a specific format:
     *  - "$2a$"
     *  - a two digit cost parameter
     *  - "$"
     *  - 22 characters from the alphabet "./0-9A-Za-z".
     *
     * @param int cost parameter for Blowfish hash algorithm
     * @return string the salt
     */
    protected function generateSalt($cost = 10) {
        if (!is_numeric($cost) || $cost < 4 || $cost > 31) {
            throw new CException(Yii::t('Cost parameter must be between 4 and 31.'));
        }
        // Get some pseudo-random data from mt_rand().
        $rand = '';
        for ($i = 0; $i < 8; ++$i)
            $rand.=pack('S', mt_rand(0, 0xffff));
        // Add the microtime for a little more entropy.
        $rand.=microtime();
        // Mix the bits cryptographically.
        $rand = sha1($rand, true);
        // Form the prefix that specifies hash algorithm type and cost parameter.
        $salt = '$2a$' . str_pad((int) $cost, 2, '0', STR_PAD_RIGHT) . '$';
        // Append the random salt string in the required base64 format.
        $salt.=strtr(substr(base64_encode($rand), 0, 22), array('+' => '.'));
        return $salt;
    }

    public function search($searchArgument = null) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = Utility::getCriteria($searchArgument);

        $criteria->compare('id', $this->id);
        $criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('telephone', $this->telephone, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}