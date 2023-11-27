<?php

class Request
{
    private $_rules = [], $_messages = [], $_errors = [];
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    /**
     * 1. method
     * 2. body
     */

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isPost()
    {
        return $this->getMethod() == 'post' ? true : false;
    }

    public function isGet()
    {
        return $this->getMethod() == 'get' ? true : false;
    }

    public function getFields()
    {
        $dataFields = [];

        if ($this->isGet()) {
            // Xử lý lấy dữ liệu với phương thức GET
            if (!empty($_GET)) {
                foreach ($_GET as $key => $value) {
                    if (is_array($value)) {
                        $dataFields[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                        echo $dataFields[$key];
                    } else {
                        $dataFields[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                    }
                }
            }
        }

        if ($this->isPost()) {
            // Xử lý lấy dữ liệu với phương thức POST
            if (!empty($_POST)) 
            {
           
                foreach ($_POST as $key => $value) {
                    if (is_array($value)) {
                        $dataFields[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                    } else {
                        $dataFields[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                    }
                }
            }

            // Xử lý lấy dữ liệu từ các file
            if (!empty($_FILES)) {
                foreach ($_FILES as $key => $file) {
                    $dataFields[$key] = $file;
                }
            }

          
         
        }

        return $dataFields;
    }

    /**
     * Lấy dữ liệu từ request dưới dạng một mảng.
     *
     * @param string|null $name Tên trường cần lấy dữ liệu.
     * @param mixed|null $default Giá trị mặc định nếu trường không tồn tại.
     *
     * @return mixed Giá trị của trường được chỉ định.
     */
    public function input($name = null, $default = null)
    {
        if ($name === null) {
            return $this->getFields();
        }

        return $this->getFields()[$name] ?? $default;
    }

    /**
     * Lấy dữ liệu từ request dưới dạng một giá trị đơn lẻ.
     *
     * @param string|null $name Tên trường cần lấy dữ liệu.
     * @param mixed|null $default Giá trị mặc định nếu trường không tồn tại.
     *
     * @return mixed Giá trị của trường được chỉ định.
     */
    public function get($name = null, $default = null)
    {
        return $this->input($name, $default);
    }

    // set rules
    public function rules($rules = [])
    {
        $this->_rules = $rules;
    }

    // set message
    public function messages($messages = [])
    {
        $this->_messages = $messages;
    }

    //Run validate
    public function validate()
    {

        $this->_rules = array_filter($this->_rules);

        $checkValidate = true;

        if (!empty($this->_rules)) {

            $dataFields = $this->getFields();

            foreach ($this->_rules as $fieldName => $ruleItem) {
                $ruleItemArr = explode('|', $ruleItem);

                foreach ($ruleItemArr as $rules) {

                    $ruleName = null;
                    $ruleValue = null;

                    $rulesArr = explode(':', $rules);

                    $ruleName = reset($rulesArr);

                    if (count($rulesArr) > 1) {
                        $ruleValue = end($rulesArr);
                    }


                    if ($ruleName == 'required') {
                        if (empty(trim($dataFields[$fieldName]))) {
                            $this->setErrors($fieldName, $ruleName);
                            $checkValidate = false;
                        }
                    }

                    if ($ruleName == 'min') {
                        $fieldValue = $dataFields[$fieldName];
                        
                        if (is_numeric($fieldValue)) {
                            if ($fieldValue < $ruleValue) {
                                $this->setErrors($fieldName, $ruleName);
                                $checkValidate = false;
                            }
                        } else {
                            if (strlen($fieldValue) < $ruleValue) {
                                $this->setErrors($fieldName, $ruleName);
                                $checkValidate = false;
                            }
                        }
                    }
                    
                    if ($ruleName == 'max') {
                        $fieldValue = $dataFields[$fieldName];
                        
                        if (is_numeric($fieldValue)) {
                            if ($fieldValue > $ruleValue) {
                                $this->setErrors($fieldName, $ruleName);
                                $checkValidate = false;
                            }
                        } else {
                            if (strlen($fieldValue) > $ruleValue) {
                                $this->setErrors($fieldName, $ruleName);
                                $checkValidate = false;
                            }
                        }
                    }
                    if ($ruleName == 'email') {
                        if (!filter_var($dataFields[$fieldName], FILTER_VALIDATE_EMAIL)) {
                            $this->setErrors($fieldName, $ruleName);
                            $checkValidate = false;
                        }
                    }

                    if ($ruleName == 'image') {
                     
                        if (!in_array($dataFields[$fieldName]['type'][0], ['image/jpeg', 'image/png', 'image/jpg'])) {
                            $this->setErrors($fieldName, $ruleName);
                            $checkValidate = false;
                        }
                    }
                    if ($ruleName == 'size') {
                        if ($dataFields[$fieldName]['type'][0] > 100000) {
                            $this->setErrors($fieldName, $ruleName);
                            $checkValidate = false;
                        }
                    }

                    if ($ruleName == 'resolution') {
                        if(!empty($dataFields[$fieldName]['tmp_name'][0])) {
                            $fileContents = file_get_contents($dataFields[$fieldName]['tmp_name'][0]);
                        }

                        if (!empty($fileContents)) {
                            $image = imagecreatefromstring($fileContents);

                            if ($image) {
                                $width = imagesx($image);
                                $height = imagesy($image);

                                if ($width < 200 || $height < 200) {
                                    $this->setErrors($fieldName, $ruleName);
                                    $checkValidate = false;
                                }

                                imagedestroy($image);
                            }
                        }
                    }
                    if ($ruleName == 'match') {

                        if (trim($dataFields[$fieldName]) != trim($dataFields[$ruleValue])) {
                            $this->setErrors($fieldName, $ruleName);
                            $checkValidate = false;
                        }
                    }

                    if ($ruleName == 'unique') {
                        $tableName = null;
                        $fieldCheck = null;
                    
                        if (!empty($rulesArr[1])) {
                            $tableName = $rulesArr[1];
                        }
                    
                        if (!empty($rulesArr[2])) {
                            $fieldCheck = $rulesArr[2];
                        }
                    
                    
                        if (!empty($tableName) && !empty($fieldCheck)) {
                            if (count($rulesArr) == 3) {
                                $checkExist = $this->db->query("SELECT $fieldCheck FROM $tableName WHERE $fieldCheck='" . trim($dataFields[$fieldName]) . "'")->rowCount();
                            } elseif (count($rulesArr) == 4) {
                                if (!empty($rulesArr[3]) && preg_match('~.+?\=.+?~is', $rulesArr[3])) {
                                    $conditionWhere = $rulesArr[3];
                                    $conditionWhere = str_replace('=', '<>', $conditionWhere);
                                    $checkExist = $this->db->query("SELECT $fieldCheck FROM $tableName WHERE $fieldCheck='" . trim($dataFields[$fieldName]) . "' AND $conditionWhere")->rowCount();
                                }
                            }
                    
                            if (!empty($checkExist)) {
                                $this->setErrors($fieldName, $ruleName);
                                $checkValidate = false;
                            }
                        }
                    }

                    //Callback validate
                    if (preg_match('~^callback_(.+)~is', $ruleName, $callbackArr)) {
                        if (!empty($callbackArr[1])) {
                            $callbackName = $callbackArr[1];
                            $controller = App::$app->getCurrentController();

                            if (method_exists($controller, $callbackName)) {

                                $checkCallback = call_user_func_array([$controller, $callbackName], [trim($dataFields[$fieldName])]);

                                if (!$checkCallback) {
                                    $this->setErrors($fieldName, $ruleName);
                                    $checkValidate = false;
                                }
                            }
                        }
                    }
                }
            }
        }

        $sessionKey = Session::isInvalid();
        Session::flash($sessionKey . '_errors', $this->errors());
        Session::flash($sessionKey . '_old', $this->getFields());

        return $checkValidate;
    }

    public function uploadImage($file) 
    {   
        $target_file = '';
        $current_month_year     = date('Y_m');
        $target_directory = 'public/uploads/products/' . $current_month_year . '/';

        if (!is_dir($target_directory)) {
            try {
                mkdir($target_directory, 0755, true);
            } catch (\Exception $e) {
                $errors[] = $e->getMessage();
                return false;
            }
        }
      
        $file_extension = strtolower(pathinfo($file['name'][0], PATHINFO_EXTENSION));
        $new_file_name = time() . '_' . uniqid() . '.' . $file_extension;
        $new_file_path = $target_directory . $new_file_name;

        while (file_exists($new_file_path)) {
            $new_file_name = time() . '_' . uniqid() . '.' . $file_extension;
            $new_file_path = $target_directory . $new_file_name;
        }

        if (!move_uploaded_file($file['tmp_name'][0], $new_file_path)) {
            $this->setErrors('images', 'upload_failed');
            return false;
        }

        return $new_file_name;
    }

    public function except($array, $keys)
{
    return array_diff_key($array, array_flip($keys));
}
    // get errors
    public function errors($fieldName = '')
    {
        if (!empty($this->_errors)) {
            if (empty($fieldName)) {
                $errorsArr = [];
                foreach ($this->_errors as $key => $error) {
                    $errorsArr[$key] = reset($error);
                }
                return $errorsArr;
            }
            return reset($this->_errors);
        }
    }

    public function setErrors($fieldName, $ruleName)
    {
        return $this->_errors[$fieldName][$ruleName] = $this->_messages[$fieldName . '.' . $ruleName];
    }
}
