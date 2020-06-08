<?php

class Utility {

    public static function getVideoDetails($url) {
        $host = explode('.', str_replace('www.', '', strtolower(parse_url($url, PHP_URL_HOST))));
        $host = isset($host[0]) ? $host[0] : $host;

        switch ($host) {
            case 'vimeo':
                $video_id = substr(parse_url($url, PHP_URL_PATH), 1);
                $hash = json_decode(file_get_contents("http://vimeo.com/api/v2/video/{$video_id}.json"));

                // header("Content-Type: text/plain");
                // print_r($hash);
                // exit;

                return array(
                    'provider' => 'vimeo',
                    'video_id' => $video_id,
                    'title' => $hash[0]->title,
                    'description' => str_replace(array("<br>", "<br/>", "<br />"), NULL, $hash[0]->description),
                    'description_nl2br' => str_replace(array("\n", "\r", "\r\n", "\n\r"), NULL, $hash[0]->description),
                    'thumbnail' => $hash[0]->thumbnail_large,
                    'video' => "https://vimeo.com/" . $hash[0]->id,
                    'embed_video' => "https://player.vimeo.com/video/" . $hash[0]->id,
                );
                break;

            case 'youtube':
                preg_match("/v=([^&#]*)/", parse_url($url, PHP_URL_QUERY), $video_id);
                $video_id = $video_id[1];
                $hash = json_decode(file_get_contents("http://gdata.youtube.com/feeds/api/videos/{$video_id}?v=2&alt=jsonc"));

                // header("Content-Type: text/plain");
                // print_r($hash);
                // exit;

                return array(
                    'provider' => 'youtube',
                    'video_id' => $video_id,
                    'title' => $hash->data->title,
                    'description' => str_replace(array("<br>", "<br/>", "<br />"), NULL, $hash->data->description),
                    'description_nl2br' => str_replace(array("\n", "\r", "\r\n", "\n\r"), NULL, nl2br($hash->data->description)),
                    'thumbnail' => $hash->data->thumbnail->hqDefault,
                    'video' => "http://www.youtube.com/watch?v=" . $hash->data->id,
                    'embed_video' => "http://www.youtube.com/v/" . $hash->data->id,
                );
                break;
        }
    }

    public static function log($var, $category = 'application') {
        Yii::log(print_r($var, true), CLogger::LEVEL_INFO, "devlog." . $category);
    }

    public static function dump($var) {
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
        die;
    }

    public static function convertTime($time, $dbFormat) {

        if ($dbFormat) {
            
        } else {

            $hours = floor($time);
            $minutes = ($time - $hours) * 60;

            return $hours . 'h' . ' ' . $minutes . 'm';
        }
    }

    public static function dateFormat($date) {
        $lang = Yii::app()->language;
        setlocale(LC_TIME, $lang);
        return self::dateTranslation($lang, $date);
    }

    public static function dateTranslation($lang, $date) {
        $month = date("M", strtotime($date));
        $rest = date('d.Y.', strtotime($date));

        switch ($lang) {
            case 'sr':
                $months = array(
                    'Jan' => 'Jan',
                    'Feb' => 'Feb',
                    'Mar' => 'Mar',
                    'Apr' => 'Apr',
                    'May' => 'Maj',
                    'Jun' => 'Jun',
                    'Jul' => 'Jul',
                    'Aug' => 'Avg',
                    'Sep' => 'Sep',
                    'Oct' => 'Okt',
                    'Nov' => 'Nov',
                    'Dec' => 'Dec'
                );
                $d = $months[$month] . ' ' . $rest;
                break;
            case 'ru':
                $months = array(
                    'Jan' => 'Янв',
                    'Feb' => 'Фев',
                    'Mar' => 'Мар',
                    'Apr' => 'Апр',
                    'May' => 'Май',
                    'Jun' => 'Июнь',
                    'Jul' => 'Июль',
                    'Aug' => 'Авг',
                    'Sep' => 'Сен',
                    'Oct' => 'Окт',
                    'Nov' => 'Ноя',
                    'Dec' => 'Дек'
                );
                $d = $months[$month] . ' ' . $rest;
                break;
            case 'de':
                $months = array(
                    'Jan' => 'Jan',
                    'Feb' => 'Feb',
                    'Mar' => 'Mär',
                    'Apr' => 'Apr',
                    'May' => 'Mai',
                    'Jun' => 'Jun',
                    'Jul' => 'Jul',
                    'Aug' => 'Aug',
                    'Sep' => 'Sep',
                    'Oct' => 'Okt',
                    'Nov' => 'Nov',
                    'Dec' => 'Dez'
                );
                $d = $months[$month] . ' ' . $rest;
                break;
            default:
                $d = date('M d.Y.', strtotime($date));
                break;
        }

        return $d;
    }

    public static function fileName($file) {

        $info = pathinfo($file);
        $file_name = basename($file, '.' . $info['extension']);

        return $file_name; // outputs 'image'
    }

    public static function photo($id, $model, $field = "PHOTO") {

        $path = Yii::app()->basePath . "/files/images/" . $model . 'Images/';
        $model = new $model('search');
        $filename = $model->findByPk($id)->$field;
        $file = $path . $filename;


        if (empty($filename) || !file_exists($file)) {
            $file = $path . "default.png";
        }

        return $file;
    }

    public static function generatePassword($length = 8) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $count = mb_strlen($chars);

        for ($i = 0, $result = ''; $i < $length; $i++) {
            $index = rand(0, $count - 1);
            $result .= mb_substr($chars, $index, 1);
        }

        return $result;
    }

    public static function create_unique_slug($string, $model, $field = 'slug') {
        $aggregationObj = new $model;
        $slug = Utility::remove_latin_chars($string);
        $slug = Utility::url_title_plus($slug);
        $slug = strtolower($slug);
        $i = 0;
        while ($aggregationObj->exists("slug=:slug", array(":slug" => $slug))) {
            if (!preg_match('/-{1}[0-9]+$/', $slug))
                $slug .= '-' . ++$i;
            else
                $slug = preg_replace('/[0-9]+$/', ++$i, $slug);
        }
        return $slug;
    }

    public static function create_unique_string($length) {
        $random = "";
        srand((double) microtime() * 1000000);
        $char_list = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $char_list .= "abcdefghijklmnopqrstuvwxyz";
        $char_list .= "1234567890-_";
        // Add the special characters to $char_list if needed
        while (Oglas::model()->exists("sifra_objave=:sifra", array(":sifra" => $random))) {
            for ($i = 0; $i < $length; $i++) {
                $random .= substr($char_list, (rand() % (strlen($char_list))), 1);
            }
        }
        return $random;
    }

    public static function remove_latin_chars($string) {

        $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ');
        $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'Dj', 'dj', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');
        return str_replace($a, $b, $string);
    }

    public static function url_title_plus($str, $separator = 'dash', $lowercase = FALSE) {
        if ($separator == 'dash') {
            $search = '_';
            $replace = '-';
        } else {
            $search = '-';
            $replace = '_';
        }

        $trans = array(
            '&\#\d+?;' => '',
            '&\S+?;' => '',
            '\s+' => $replace,
            '[^a-z0-9\-\._]' => '',
            '[«»“”!?,.]+' => '',
            $replace => $replace,
            $replace . '$' => $replace,
            '^' . $replace => $replace,
            '\.+$' => ''
        );

        $str = strip_tags($str);

        foreach ($trans as $key => $val) {
            $str = preg_replace("#" . $key . "#i", $val, $str);
        }

        if ($lowercase === TRUE) {
            $str = strtolower($str);
        }

        return trim(stripslashes($str));
    }

    /**
     * @property array $array
     * @property string $route base route that will be used for links
     * @property string $nameKey 
     * @property integer $idKey
     */
    public static function arrayToCommaSeparatedLinks($array, $route, $nameKey, $idKey, $limit = 5) {
        $linkArray = array();


        for ($n = 0; $n <= $limit; $n++) {
            if ($n >= count($array))
                break;
            $linkText = $array[$n][$nameKey];
            $linkUrl = Yii::app()->createUrl($route, array("id" => $array[$n][$idKey]));
            $htmlLink = "<a href='$linkUrl'>$linkText</a>";
            array_push($linkArray, $htmlLink);
        }

        $result = implode(", ", $linkArray);
        if (count($array) > $limit) {
            $result.= " (+" . (count($array) - $n) . " more)";
        }

        return $result;
    }

    public static function arrayToCommaSeparated($array, $nameKey) {
        $textArray = array();

        $n = 0;
        foreach ($array as $element) {
            $text = $array[$n][$nameKey];


            array_push($textArray, __($text));
            $n++;
        }
        return implode(", ", $textArray);
    }

    public static function arrayToNewLineSeparated($array, $nameKey) {
        $textArray = array();

        $n = 0;

        foreach ($array as $element) {

            $text = $array[$n][$nameKey];

            array_push($textArray, $text);
            $n++;
        }
        return implode("<br>", $textArray);
    }

    /*
     * Prints out a stylesheet file inline, with <style> tags, 
     * instead of linking to it
     */

    public static function inlineCss($filename, $absolute = false, $return = false) {
        $file = Yii::app()->basePath . "/../css/" . $filename;
        if ($absolute) {
            $file = $filename;
        }
        if (file_exists($file)) {
            $result = "<style>"
                    . file_get_contents($file);
            $result.= "</style>";
            if ($return == true) {
                return $result;
            } else {
                echo $result;
            }
        } else {
            throw new CException("The specified css file ($file) cannot be found.");
        }
    }

    public static function sendEmail(EmailForm $model, $html) {
        Yii::import('application.extensions.phpmailer.JPhpMailer');
        $mail = new JPhpMailer;
        $mail->IsSMTP();
        $mail->Host = 'localhost';
        $mail->SMTPAuth = false;
        $mail->SetFrom($model->fromEmail, $model->fromName);
        $mail->Subject = $model->subject;
        $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';

        $emailHtml = "";

        if (isset($model->headerText)) {
            $emailHtml.= "<p>" . nl2br($model->headerText) . "</p>";
        }

        $emailHtml.= $html;

        if (isset($model->footerText)) {
            $emailHtml.="<br /><p>" . nl2br($model->footerText) . "</p>";
        }

        $mail->MsgHTML($emailHtml);

        $toArray = explode(",", $model->to);
        foreach ($toArray as $value) {
            $address = trim($value);
            if (!empty($address)) {
                $mail->AddAddress($address);
            }
        }

        $ccArray = explode(",", $model->cc);
        foreach ($ccArray as $value) {
            $cc = trim($value);
            if (!empty($cc)) {
                $mail->AddCC($cc);
            }
        }

        $bccArray = explode(",", $model->bcc);
        foreach ($bccArray as $value) {
            $bcc = trim($value);
            if (!empty($ccc)) {
                $mail->AddBCC($bcc);
            }
        }

        return $mail->Send();
    }

    public static function export(Export $exportModel, Controller $controller = null) {
        if ($exportModel->type == 'pdf') {
            $pdf = new PdfWritter($exportModel->documentTitle . ".pdf", $exportModel->data);
            $pdf->output();
        } elseif ($exportModel->type == 'csv') {
            Yii::import('ext.CSVExport');
            if ($controller) {
                $actions = $controller->actions();
                if (isset($actions['find']) && isset($actions['find']['csvRelationProperties'])) {
                    $csvArg = $actions['find']['csvRelationProperties'];
                }
            }

            $csv = new CSVExport($exportModel->csvDataProvider, $csvArg);
            $csv->headers = $exportModel->dataModel->attributeLabels();
            $content = $csv->toCSV();
            $csv->callback = array("self", 'processCsvRow');

            Yii::app()->getRequest()->sendFile($exportModel->documentTitle . ".csv", $content, "text/csv", false);
        } elseif ($exportModel->type == 'email') {
            $model = new EmailForm();

            if (isset($_POST['EmailForm'])) {
                $model->attributes = $_POST['EmailForm'];
                if ($model->validate()) {
                    if ($model->preview == 0) {
                        if ($controller != null & Utility::sendEmail($model, $exportModel->data, array("address" => "daniel@itaf.eu"))) {
                            $controller->render('//email/done', array(
                                "exportModel" => $exportModel
                            ));
                            return;
                        }
                    } else {
                        $model->preview = 0;
                        Yii::app()->user->setFlash("success", "Mail is ready to be sent");
                    }
                }
            }

            $controller->render("//email/index", array(
                "html" => $exportModel->data,
                "model" => $model,
                "exportModel" => $exportModel
            ));
        } else {
            throw new CException("Non existing export type");
        }
    }

    public static function exportOld(Export $exportModel, Controller $controller = null) {
        if ($exportModel->type == "debug") {
            Utility::dump($exportModel);
        } else if ($exportModel->type == "pdf") {

            /*
              $strCookie = 'PHPSESSID=' . $_COOKIE['PHPSESSID'] . '; path=/';
              session_write_close();
              $ch = curl_init();
              curl_setopt($ch, CURLOPT_URL,"http://test-ims2.itaf.eu/index.php?r=files/photo&model=Contact&field=PHOTO&id=15&ext=.jpg");
              curl_setopt( $ch, CURLOPT_COOKIE, $strCookie );
              curl_setopt($ch, CURLOPT_HEADER, 1);
              curl_setopt($ch, CURLOPT_TIMEOUT,1000);
              $result = curl_exec($ch);
              curl_close($ch);
              echo result; die();
             * 
             */
            require_once(Yii::app()->basePath . "/components/MyTCPDF.php");
            $pdf = new MyTCPDF('P', 'cm', 'A4', true, 'UTF-8');
            $pdf->SetCreator("ITAF");
            $pdf->SetAuthor("ITAF");
            $pdf->SetFont('helvetica', '', 14, '', '', true);
            $tagvs = array('p' => array(0 => array('h' => 0, 'n' => 0), 1 => array('h' => 0, 'n' => 0)));
            $pdf->setHtmlVSpace($tagvs);
            $pdf->setCellHeightRatio(1.25);
            //$pdf->SetMargins(10,10,10,false);
            $pdf->SetTitle($exportModel->shortString);
            $pdf->SetSubject($exportModel->shortString);
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->writeHTML($exportModel->data, true, false, true, false, '');
            $pdf->Output($exportModel->documentTitle . ".pdf", "I");
        } else if ($exportModel->type == "email") {
            $model = new EmailForm();

            if (isset($_POST['EmailForm'])) {
                $model->attributes = $_POST['EmailForm'];
                if ($model->validate()) {
                    if ($model->preview == 0) {
                        if ($controller != null & Utility::sendEmail($model, $exportModel->data, array("address" => "daniel@itaf.eu"))) {
                            $controller->render('//email/done', array(
                                "exportModel" => $exportModel
                            ));
                            return;
                        }
                    } else {
                        $model->preview = 0;
                        Yii::app()->user->setFlash("success", "Mail is ready to be sent");
                    }
                }
            }

            $controller->render("//email/index", array(
                "html" => $exportModel->data,
                "model" => $model,
                "exportModel" => $exportModel
            ));
        } else if ($exportModel->type == "csv") {
            Yii::import('ext.CSVExport');
            if ($controller) {
                $actions = $controller->actions();
                if (isset($actions['find']) && isset($actions['find']['csvRelationProperties'])) {
                    $csvArg = $actions['find']['csvRelationProperties'];
                }
            }

            $csv = new CSVExport($exportModel->csvDataProvider, $csvArg);
            $csv->headers = $exportModel->dataModel->attributeLabels();
            $content = $csv->toCSV();
            $csv->callback = array("self", 'processCsvRow');
            ;
            Yii::app()->getRequest()->sendFile($exportModel->documentTitle . ".csv", $content, "text/csv", false);
        } else {
            throw new CException("Non existing export type");
        }
    }

    /**
     * Function that converts dutch date format to a database format, and vice versa
     * @param boolean $dbformat Usage:
     * TRUE - returned date will be in a format suited for a database
     * FALSE - returned date will be in a format suited for the user interface
     * NULL (default) - date format will be reversed
     */
    public static function formatDate($date, $dbformat = null, $time = true) {
        if ($date != "") {
            $uiFormat = preg_match("/^[<>=]{0,2}([0-9]{2,2})-([0-9]{2,2})-([0-9]{4,4})(.*)?/", $date, $uiFormatMatches);
            $dbFormat = preg_match("/^[<>=]{0,2}([0-9]{4,4})-([0-9]{2,2})-([0-9]{2,2})(.*)?/", $date, $dbFormatMatches);
            $d;
            $m;
            $y;
            $t;

            if ($uiFormat == 1) {
                $d = $uiFormatMatches[1];
                $m = $uiFormatMatches[2];
                $y = $uiFormatMatches[3];
                $t = $uiFormatMatches[4];
            } elseif ($dbFormat == 1) {
                $d = $dbFormatMatches[3];
                $m = $dbFormatMatches[2];
                $y = $dbFormatMatches[1];
                $t = $dbFormatMatches[4];
            } else {
                throw new InvalidArgumentException("a date doesn't seem to be in the correct format ($date)");
            }

            $result = "";
            if ($dbformat == true) {
                $result = $y . "-" . $m . "-" . $d;
            } elseif ($dbformat == false) {
                $result = $d . "-" . $m . "-" . $y;
            } elseif ($dbformat == null) {
                if ($uiFormat == 1) {
                    $result = $y . "-" . $m . "-" . $d;
                } else {
                    $result = $d . "-" . $m . "-" . $y;
                }
            }

            if (strlen($t) == 9 && $time == true) {
                $result.= $t;
            }
            return $result;
        }
    }

    public static function notification($title, $text = "", $type = "") {
        echo "<script type='text/javascript'>notification(\"$title\", \"$text\", \"$type\")</script>";
    }

    public static function truncate($text, $length = 100, $ending = '...', $exact = true, $considerHtml = false) {
        if (is_array($ending)) {
            extract($ending);
        }
        if ($considerHtml) {
            if (mb_strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
                return $text;
            }
            $totalLength = mb_strlen($ending);
            $openTags = array();
            $truncate = '';
            preg_match_all('/(<\/?([\w+]+)[^>]*>)?([^<>]*)/', $text, $tags, PREG_SET_ORDER);
            foreach ($tags as $tag) {
                if (!preg_match('/img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param/s', $tag[2])) {
                    if (preg_match('/<[\w]+[^>]*>/s', $tag[0])) {
                        array_unshift($openTags, $tag[2]);
                    } else if (preg_match('/<\/([\w]+)[^>]*>/s', $tag[0], $closeTag)) {
                        $pos = array_search($closeTag[1], $openTags);
                        if ($pos !== false) {
                            array_splice($openTags, $pos, 1);
                        }
                    }
                }
                $truncate .= $tag[1];

                $contentLength = mb_strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', ' ', $tag[3]));
                if ($contentLength + $totalLength > $length) {
                    $left = $length - $totalLength;
                    $entitiesLength = 0;
                    if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', $tag[3], $entities, PREG_OFFSET_CAPTURE)) {
                        foreach ($entities[0] as $entity) {
                            if ($entity[1] + 1 - $entitiesLength <= $left) {
                                $left--;
                                $entitiesLength += mb_strlen($entity[0]);
                            } else {
                                break;
                            }
                        }
                    }

                    $truncate .= mb_substr($tag[3], 0, $left + $entitiesLength);
                    break;
                } else {
                    $truncate .= $tag[3];
                    $totalLength += $contentLength;
                }
                if ($totalLength >= $length) {
                    break;
                }
            }
        } else {
            if (mb_strlen($text) <= $length) {
                return $text;
            } else {
                $truncate = mb_substr($text, 0, $length - strlen($ending));
            }
        }
        if (!$exact) {
            $spacepos = mb_strrpos($truncate, ' ');
            if (isset($spacepos)) {
                if ($considerHtml) {
                    $bits = mb_substr($truncate, $spacepos);
                    preg_match_all('/<\/([a-z]+)>/', $bits, $droppedTags, PREG_SET_ORDER);
                    if (!empty($droppedTags)) {
                        foreach ($droppedTags as $closingTag) {
                            if (!in_array($closingTag[1], $openTags)) {
                                array_unshift($openTags, $closingTag[1]);
                            }
                        }
                    }
                }
                $truncate = mb_substr($truncate, 0, $spacepos);
            }
        }

        $truncate .= $ending;

        if ($considerHtml) {
            foreach ($openTags as $tag) {
                $truncate .= '</' . $tag . '>';
            }
        }

        return $truncate;
    }

    /*
      @param string $text String to truncate.
      @param integer $length Length of returned string, including ellipsis.
      @param string $ending Ending to be appended to the trimmed string.
      @param boolean $exact If false, $text will not be cut mid-word
      @param boolean $considerHtml If true, HTML tags would be handled correctly
      @return string Trimmed string.
     */

    public static function truncate2($text, $length = 100, $ending = '...', $exact = false, $considerHtml = true) {
        if ($considerHtml) {
            // if the plain text is shorter than the maximum length, return the whole text
            if (strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
                return $text;
            }
            // splits all html-tags to scanable lines
            preg_match_all('/(<.+?>)?([^<>]*)/s', $text, $lines, PREG_SET_ORDER);
            $total_length = strlen($ending);
            $open_tags = array();
            $truncate = '';
            foreach ($lines as $line_matchings) {
                // if there is any html-tag in this line, handle it and add it (uncounted) to the output
                if (!empty($line_matchings[1])) {
                    // if it's an "empty element" with or without xhtml-conform closing slash
                    if (preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param)(\s.+?)?)>$/is', $line_matchings[1])) {
                        // do nothing
                        // if tag is a closing tag
                    } else if (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $line_matchings[1], $tag_matchings)) {
                        // delete tag from $open_tags list
                        $pos = array_search($tag_matchings[1], $open_tags);
                        if ($pos !== false) {
                            unset($open_tags[$pos]);
                        }
                        // if tag is an opening tag
                    } else if (preg_match('/^<\s*([^\s>!]+).*?>$/s', $line_matchings[1], $tag_matchings)) {
                        // add tag to the beginning of $open_tags list
                        array_unshift($open_tags, strtolower($tag_matchings[1]));
                    }
                    // add html-tag to $truncate'd text
                    $truncate .= $line_matchings[1];
                }
                // calculate the length of the plain text part of the line; handle entities as one character
                $content_length = strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', ' ', $line_matchings[2]));
                if ($total_length + $content_length > $length) {
                    // the number of characters which are left
                    $left = $length - $total_length;
                    $entities_length = 0;
                    // search for html entities
                    if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', $line_matchings[2], $entities, PREG_OFFSET_CAPTURE)) {
                        // calculate the real length of all entities in the legal range
                        foreach ($entities[0] as $entity) {
                            if ($entity[1] + 1 - $entities_length <= $left) {
                                $left--;
                                $entities_length += strlen($entity[0]);
                            } else {
                                // no more characters left
                                break;
                            }
                        }
                    }
                    $truncate .= substr($line_matchings[2], 0, $left + $entities_length);
                    // maximum lenght is reached, so get off the loop
                    break;
                } else {
                    $truncate .= $line_matchings[2];
                    $total_length += $content_length;
                }
                // if the maximum length is reached, get off the loop
                if ($total_length >= $length) {
                    break;
                }
            }
        } else {
            if (strlen($text) <= $length) {
                return $text;
            } else {
                $truncate = substr($text, 0, $length - strlen($ending));
            }
        }
        // if the words shouldn't be cut in the middle...
        if (!$exact) {
            // ...search the last occurance of a space...
            $spacepos = strrpos($truncate, ' ');
            if (isset($spacepos)) {
                // ...and cut the text in this position
                $truncate = substr($truncate, 0, $spacepos);
            }
        }
        // add the defined ending to the text
        $truncate .= $ending;
        if ($considerHtml) {
            // close all unclosed html-tags
            foreach ($open_tags as $tag) {
                $truncate .= '</' . $tag . '>';
            }
        }
        return $truncate;
    }

    public static function excerpt($txt, $length = 260, $convertToText = false) {
        if ($convertToText && isset($txt) && strlen($txt) > 0) {
            require_once(Yii::app()->basePath . "/components/html2text.php");
            $txt = @convert_html_to_text($txt);
        }

        if (strlen($txt) > $length) {
            $ret = Utility::truncate($txt, $length, " ...", true, true);
            $content = preg_replace("/<img[^>]+\>/i", "", $ret);
            return $content;
        } else {
            return $txt;
        }
    }

    /**
     * @return CDbCriteria
     */
    public static function getCriteria($searchArgument = null) {
        if (is_object($searchArgument) && (get_class($searchArgument) == "CDbCriteria" || get_class($searchArgument) == "Criteria")) {
            $criteria = $searchArgument;
        } else {
            $criteria = new CDbCriteria();
            if (is_string($searchArgument)) {
                $criteria->addCondition($searchArgument);
            }
        }
        return $criteria;
    }

    public static function createUrl($route, $params = array()) {
        return Yii::app()->createUrl($route, $params);
    }

    public static function setFlashSuccess($str = '') {
        if (empty($str)) {
            $str = __("Success");
        }

        Yii::app()->user->setFlash("success", $str);
    }

    public static function setFlashError($str = '') {
        if (empty($str)) {
            $str = __("Error");
        }

        Yii::app()->user->setFlash("error", $str);
    }

    public static function setFlashNotice($str) {
        Yii::app()->user->setFlash("notice", $str);
    }

    public static function startsWith($haystack, $needle) {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }

    public static function endsWith($haystack, $needle) {
        $length = strlen($needle);
        $start = $length * -1; //negative
        return (substr($haystack, $start) === $needle);
    }

    public static function addWithToCriteria($with, $newItem) {
        if (is_array($with)) {
            if (is_array($newItem)) {
                return array_merge($with, $newItem);
            } else {
                $with[] = $newItem;
            }
            return $with;
        } elseif (is_string($with)) {
            $result = array();
            $result[] = $with;
            if (is_array($newItem)) {
                return array_merge($result, $newItem);
            } else {
                $result[] = $newItem;
            }
            return $result;
        } else {
            return $newItem;
        }
    }

    public function processCsvRow($row) {
        Utility::dump($row);
    }

    public static function idColumn($id = "id", $value = null) {
        $result = array(
            'name' => $id,
            'htmlOptions' => array(
                'class' => 'idColumn'
            ),
            'headerHtmlOptions' => array(
                'class' => 'idColumn'
            ),
        );
        if (isset($value)) {
            $result['value'] = $value;
        }
        return $result;
    }

    public static function rmDir($dirPath) {
        if (!is_dir($dirPath)) {
            throw new InvalidArgumentException('$dirPath must be a directory');
        } else {
            $dirPath = realpath($dirPath);
        }

        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }

        $files = scandir($dirPath);

        foreach ($files as $file) {
            if ($file != "." && $file != "..") {
                if (is_dir($dirPath . $file)) {
                    self::rmDir($dirPath . $file);
                } else {
                    unlink($dirPath . $file);
                }
            }
        }
        rmdir($dirPath);
    }

    public static function rmFile($file) {
        if (is_file($file)) {
            unlink($file);
        }
    }

    public static function removeFile($id, $model, $field) {
        $folder = Yii::app()->basePath . '/files/images/' . $model . 'Images/';
        $model = new $model('search');
        $model = $model->findByPk($id);
        $oldPhoto = $folder . $model->$field;
        if (file_exists($oldPhoto) && is_file($oldPhoto)) {
            if (unlink($oldPhoto)) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }

    public static function getPageSize($i = null) {
        if ($i == null) {

            $i = 10;
        }
        return $i;
    }

    /**
     * @return User
     */
    public static function getUser($id = null) {
        if (!isset($id))
            $id = Yii::app()->user->id;
        return User::model()->findByPk($id);
    }

    public static function fileExtension($filename) {

        $ext = substr(strrchr($filename, '.'), 1);

        if ($ext == 'png' || $ext == 'jpg' || $ext == 'gif') {
            $icon = 'picture';
        } elseif ($ext == 'pdf') {
            $icon = 'book';
        } elseif ($ext == 'doc' || $ext == 'docx') {
            $icon = 'list-alt';
        } else {
            $icon = 'file';
        }

        return $icon;
    }

    public static function searchByDate($dateField, $str) {
        if (isset($str)) {
            preg_match("/([0-9]{2,2})-([0-9]{2,2})-([0-9]{4,4})/", $str, $dateMatch);
            if (count($dateMatch) > 0) {

                preg_match('[<]', $str, $lt);
                preg_match('[>]', $str, $gt);
                $replace = $dateField . " $1 '$4-$3-$2'";

                if (count($lt) == 0 && count($gt) == 0) {
                    $replace = $dateField . " = '$4-$3-$2'";
                }
                preg_match_all("/[><]?[=]?[0-9]{2,2}-[0-9]{2,2}-[0-9]{4,4}/", $str, $dateMatches);
                $result = array();

                foreach ($dateMatches[0] as $date) {
                    $res = preg_replace("/([><]?[=]?)?([0-9]{2,2})-([0-9]{2,2})-([0-9]{4,4})/", $replace, $date);

                    $result[] = $res;
                }

                return implode(" AND ", $result);
            }
            else
                return "1=1";
        }
        else {
            return "1=1";
        }
    }

    public static function checkAccess($action, $controller = null) {
        //Utility::dump($operation);        
        return true;
        if (strpos($action, ":") != false) {
            $split = explode(":", $action);
            $count = count($split);
            if ($count == 2) {
                $c = $split[0];
                $a = $split[1];
            } elseif ($count == 3) {
                $c = $split[1];
                $a = $split[2];
            }
            else
                throw new Exception("Wrong permission format: " . $action);

            $operation = Utility::getRbamOperation($a, $c);
        } else {
            $operation = Utility::getRbamOperation($action, $controller);
        }

        //if(isset($GLOBALS['rbamCache'][$operation])) return $GLOBALS['rbamCache'][$operation];       

        if ($operation == "?" && !Yii::app()->user->isGuest)
            return true;

        $allow = Yii::app()->user->checkAccess($operation);
        Utility::log($operation, $allow ? "permission-checkAccess" : "permission-Utility::checkAccess.FALSE");

        if (!array_key_exists($operation, $rbamCache)) {
            //$GLOBALS['rbamCache'][$operation] = $allow;
        }

        return $allow;
    }

    public static function getRbamOperation($action, $controller = null) {
        if (isset($controller)) {
            if ($controller instanceof Controller) {
                $c = $controller;
            } else {
                $controllerName = ucfirst($controller) . "Controller";
                if (class_exists($controllerName)) {
                    $c = new $controllerName($controller);
                } else {
                    Utility::log("FALSE: MISSING CONTROLLER. ({$controllerName})");
                    return null;
                }
            }
            $permission = $c->getRbamOperation($action);
        } else {
            $permission = Yii::app()->getController()->getRbamOperation($action);
        }

        // the returned permission could still be in the Controller:Action format,
        // because the action could have been overriden in the controller to "redirect"
        // the permission to another controller
        if (strpos($permission, ":") != false) {
            $split = explode(":", $permission);
            $count = count($split);

            if ($count == 3) {
                $c = $split[1];
                $a = $split[2];
                return Utility::getRbamOperation($a, $c);
            }
        }

        return $permission;
    }

    public static function check($access) {
        return Yii::app()->user->checkAccess($access);
    }

    public static function getMonths($type = 'array', $short = false) {

        $months = array(
            __('January'),
            __('February'),
            __('March'),
            __('April'),
            __('May'),
            __('June'),
            __('July'),
            __('August'),
            __('September'),
            __('October'),
            __('November'),
            __('December')
        );

        if ($short) {
            $months = array(
                __('Jan'),
                __('Feb'),
                __('Mar'),
                __('Apr'),
                __('May'),
                __('Jun'),
                __('Jul'),
                __('Aug'),
                __('Sep'),
                __('Oct'),
                __('Nov'),
                __('Dec')
            );
        }

        if ($type == 'json') {
            $months = json_encode($months);
        }
        return $months;
    }

    public static function getDays($type = 'array', $short = false) {

        $days = array(
            __('Sunday'),
            __('Monday'),
            __('Tuesday'),
            __('Wednesday'),
            __('Thursday'),
            __('Friday'),
            __('Saturday'),
        );
        if ($short) {
            $days = array(
                __('Sun'),
                __('Mon'),
                __('Tue'),
                __('Wed'),
                __('Thu'),
                __('Fri'),
                __('Sat'),
            );
        }
        if ($type == 'json') {
            $days = json_encode($days);
        }
        return $days;
    }

    public static function listData($models, $valueField, $textField, $groupField = '') {
        $listData = array();
        if ($groupField === '') {
            foreach ($models as $model) {
                $value = CHtml::value($model, $valueField);
                $text = CHtml::value($model, $textField);
                $text = __($text);
                $listData[$value] = $text;
            }
        } else {
            foreach ($models as $model) {
                $group = CHtml::value($model, $groupField);
                $value = CHtml::value($model, $valueField);
                $text = CHtml::value($model, $textField);
                $text = __($text);
                $listData[$group][$value] = $text;
            }
        }
        return $listData;
    }

    public static function SaveManyMany($model, $aggregationClass, $relationAttribute, $attr1, $attr2) {
        $aggregationObj = new $aggregationClass;

        /*
          $attrs= array();

          foreach($aggregationObj->getAttributes() as $key=>$attribute) {
          if(preg_match("/_id/", $key)!==0) {
          $attrs[]= $key;
          }
          }

          if(count($attrs)!=2) {
          Utility::dump("Didn't find 2 attrs");
          }
         */

        if (isset($model->{$relationAttribute})) {

            foreach ($model->{$relationAttribute} as $key => $newItemId) {
                if ($newItemId instanceof CActiveRecord) {
                    //Utility::dump($newItemId);
                    $manyManyObj = $aggregationObj->findByAttributes(array($attr1 => $model->id, $attr2 => $newItemId->{$attr2}));

                    if ($manyManyObj == null) {
                        $newObj = new $aggregationClass;
                        $newObj->attributes = $newItemId;

                        if (!$newObj->save()) {
                            Utility::dump($newObj->getErrors());
                        }
                    }
                } else {
                    $manyManyObj = $aggregationObj->findByAttributes(array($attr1 => $model->id, $attr2 => $newItemId));
                    if ($manyManyObj == null) {
                        $newObj = new $aggregationClass;
                        $newObj->{$attr1} = $model->id;
                        $newObj->{$attr2} = $newItemId;

                        if (!$newObj->save()) {
                            Utility::dump($newObj->getErrors());
                        }
                    }
                }
            }

            $c = new CDbCriteria();
            $c->together = true;
            $c->compare($attr1, $model->id);
            $c->addNotInCondition($attr2, $model->{$relationAttribute});
            $oldItems = $aggregationObj->findAll($c);
            foreach ($oldItems as $oldItem) {
                $oldItem->delete();
            }
        }
    }

    public static function checkDepartmentAccess($departments) {
        foreach ($departments as $dep) {
            if (Utility::checkSingleDepAccess($dep))
                return true;
        }
        return false;
    }

    private static function checkSingleDepAccess($dep) {
        $userDeps = Utility::getUser()->departments;
        foreach ($userDeps as $userDep) {
            Utility::checkDepTree($dep, $userDep);
        }
    }

    private static function checkDepTree($dep, $userDep) {
        // TODO: fix. it.
    }

    public static function resize($imagePath, $opts = null) {
        $imagePath = urldecode($imagePath);
# start configuration
        $cacheFolder = ''; # path to your cache folder, must be writeable by web server
        $remoteFolder = $cacheFolder . ''; # path to the folder you wish to download remote images into

        $defaults = array('crop' => false, 'scale' => 'false', 'thumbnail' => false, 'maxOnly' => false,
            'canvas-color' => 'transparent', 'output-filename' => false,
            'cacheFolder' => $cacheFolder, 'remoteFolder' => $remoteFolder, 'quality' => 90, 'cache_http_minutes' => 20);

        $opts = array_merge($defaults, $opts);

        $cacheFolder = $opts['cacheFolder'];
        $remoteFolder = $opts['remoteFolder'];

        $path_to_convert = 'convert'; # this could be something like /usr/bin/convert or /opt/local/share/bin/convert
## you shouldn't need to configure anything else beyond this point

        $purl = parse_url($imagePath);
        $finfo = pathinfo($imagePath);
        $ext = $finfo['extension'];

# check for remote image..
        if (isset($purl['scheme']) && ($purl['scheme'] == 'http' || $purl['scheme'] == 'https')):
# grab the image, and cache it so we have something to work with..
            list($filename) = explode('?', $finfo['basename']);
            $local_filepath = $remoteFolder . $filename;
            $download_image = true;
            if (file_exists($local_filepath)):
                if (filemtime($local_filepath) < strtotime('+' . $opts['cache_http_minutes'] . ' minutes')):
                    $download_image = false;
                endif;
            endif;
            if ($download_image == true):
                $img = file_get_contents($imagePath);
                file_put_contents($local_filepath, $img);
            endif;
            $imagePath = $local_filepath;
        endif;

        if (file_exists($imagePath) == false):
            $imagePath = $_SERVER['DOCUMENT_ROOT'] . $imagePath;
            if (file_exists($imagePath) == false):
                return 'image not found';
            endif;
        endif;

        if (isset($opts['w'])): $w = $opts['w'];
        endif;
        if (isset($opts['h'])): $h = $opts['h'];
        endif;

        $filename = md5_file($imagePath);

// If the user has requested an explicit output-filename, do not use the cache directory.
        if (false !== $opts['output-filename']) :
            $newPath = $opts['output-filename'];
        else:
            if (!empty($w) and !empty($h)):
                $newPath = $cacheFolder . $filename . '_w' . $w . '_h' . $h . (isset($opts['crop']) && $opts['crop'] == true ? "_cp" : "") . (isset($opts['scale']) && $opts['scale'] == true ? "_sc" : "") . '.' . $ext;
            elseif (!empty($w)):
                $newPath = $cacheFolder . $filename . '_w' . $w . '.' . $ext;
            elseif (!empty($h)):
                $newPath = $cacheFolder . $filename . '_h' . $h . '.' . $ext;
            else:
                return false;
            endif;
        endif;

        $create = true;

        if (file_exists($newPath) == true):
            $create = false;
            $origFileTime = date("YmdHis", filemtime($imagePath));
            $newFileTime = date("YmdHis", filemtime($newPath));
            if ($newFileTime < $origFileTime): # Not using $opts['expire-time'] ??
                $create = true;
            endif;
        endif;

        if ($create == true):
            if (!empty($w) and !empty($h)):

                list($width, $height) = getimagesize($imagePath);
                $resize = $w;

                if ($width > $height):
                    $resize = $w;
                    if (true === $opts['crop']):
                        $resize = "x" . $h;
                    endif;
                else:
                    $resize = "x" . $h;
                    if (true === $opts['crop']):
                        $resize = $w;
                    endif;
                endif;

                if (true === $opts['scale']):
                    $cmd = $path_to_convert . " " . escapeshellarg($imagePath) . " -resize " . escapeshellarg($resize) .
                            " -quality " . escapeshellarg($opts['quality']) . " " . escapeshellarg($newPath);
                else:
                    $cmd = $path_to_convert . " " . escapeshellarg($imagePath) . " -resize " . escapeshellarg($resize) .
                            " -size " . escapeshellarg($w . "x" . $h) .
                            " xc:" . escapeshellarg($opts['canvas-color']) .
                            " +swap -gravity center -composite -quality " . escapeshellarg($opts['quality']) . " " . escapeshellarg($newPath);
                endif;

            else:
                $cmd = $path_to_convert . " " . escapeshellarg($imagePath) .
                        " -thumbnail " . (!empty($h) ? 'x' : '') . $w . "" .
                        (isset($opts['maxOnly']) && $opts['maxOnly'] == true ? "\>" : "") .
                        " -quality " . escapeshellarg($opts['quality']) . " " . escapeshellarg($newPath);
            endif;

            $c = exec($cmd, $output, $return_code);
            if ($return_code != 0) {
                error_log("Tried to execute : $cmd, return code: $return_code, output: " . print_r($output, true));
                return false;
            }
        endif;

# return cache file path
        return str_replace($_SERVER['DOCUMENT_ROOT'], '', $newPath);
    }

    public static function resizeImg($imagePath, $w, $h, $folder) {
        Yii::import('ext.ImageResizer');

        $resizeObj = new ImageResizer($imagePath);
        $resizeObj->resizeImage($w, $h, 'crop');
        $resizeObj->saveImage($folder, 100);
    }

    public static function createPageTitle($title) {
        return $title . " | " . param("page_title_prefix");
    }

    public static function create_filename($string) {
        $string = preg_replace("/\\.[^.\\s]{3,4}$/", "", $string);
        $filename = Utility::remove_latin_chars($string);
        $filename = Utility::url_title_plus($filename);
        $filename = strtolower($filename);

        return $filename;
    }

    public static function createUploadFolder($date, $delimiter = '/') {
        $base_folder_path = param("base_upload_path");
        $date = explode($delimiter, $date);
        $next = '';
        foreach ($date as $item) {
            if (!is_dir($base_folder_path . $next . $item . '/')) {
                mkdir($base_folder_path . $next . $item . '/', 0755, false);
            }
            $next .= $item . '/';
        }

        if (!is_dir($base_folder_path . $next . 'thumbs/')) {
            mkdir($base_folder_path . $next . 'thumbs/', 0755, false);
        }

        return $base_folder_path . $next;
    }

    public static function getImageUrlByDate($date, $delimiter = '/') {
        $base_folder_url = param('baseUrl');
        $date = explode($delimiter, $date);
        $next = '';
        foreach ($date as $item) {
            $next .= $item . '/';
        }

        return $base_folder_url . 'uploads/medias/' . $next;
    }

    public static function getImagePathByDate($date, $delimiter = '/') {
        $base_folder_url = Yii::app()->basePath . "/../";
        $date = explode($delimiter, $date);
        $next = '';
        foreach ($date as $item) {
            $next .= $item . '/';
        }

        return $base_folder_url . 'uploads/medias/' . $next;
    }

}