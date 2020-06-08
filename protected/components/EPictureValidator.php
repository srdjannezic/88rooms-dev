<?php

/**
 * EPictureValidator class.
 *
 * Validates the image
 *
 * @author   Sergey Tsivin <sergey.tsivin@gmail.com>
 * @license  http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @link     http://www.yiiframework.com/extension/epicturevalidator/
 */
class EPictureValidator extends CValidator
{

    /**
     * @var boolean whether the attribute requires a file to be uploaded or not.
     * Defaults to false, meaning a file is required to be uploaded.
     */
    public $allowEmpty = false;
    /**
     * @var integer the minimum picture width
     */
    public $minWidth;
    /**
     * @var integer the minimum picture height
     */
    public $minHeight;

    /**
     * Set the attribute and then validates using {@link validateFile}.
     * If there is any error, the error message is added to the object.
     * @param CModel $object the object being validated
     *
     * @param string $attribute the attribute being validated
     *
     * @return void
     */
    protected function validateAttribute($object, $attribute)
    {
        $file = $object->$attribute;

        if (!$file instanceof CUploadedFile) {
            $file = CUploadedFile::getInstance($object, $attribute);
            if (null === $file)
                return $this->emptyAttribute($object, $attribute);
        }


        $type = CFileHelper::getMimeType($file->tempName);
        list($type, $subtype) = @explode('/', $type);
        if ('image' != $type) {
            $message = Yii::t('ext', 'Fajl nije slika.');
            //$this->addError($object, $attribute, $message);
            //return;
        }

        $size = getimagesize($file->tempName);
        if (false === $size) {
            $message = Yii::t('ext', 'Fajl nije slika.');
            $this->addError($object, $attribute, $message);
            return;
        }

        if (!empty($this->minWidth) && $size[0] < $this->minWidth) {
            $message = Yii::t('ext', 'Slika je previše mala: širina slike treba da bude najmanje {minWidth} pixela');
            $this->addError($object, $attribute, $message, array('{minWidth}' => $this->minWidth));
        }

        if (!empty($this->minHeight) && $size[1] < $this->minHeight) {
            $message = Yii::t('ext', 'Slika je previše mala: visina slike treba da bude najmanje {minHeight} pixela');
            $this->addError($object, $attribute, $message, array('{minHeight}' => $this->minHeight));
        }
    }

    /**
     * Raises an error to inform end user about blank attribute.
     * @param CModel $object the object being validated
     * @param string $attribute the attribute being validated
     *
     * @return void
     */
    protected function emptyAttribute($object, $attribute)
    {
        if (!$this->allowEmpty) {
            $message = $this->message !== null ? $this->message : Yii::t('yii', '{attribute} cannot be blank.');
            $this->addError($object, $attribute, $message);
        }
    }

}

?>