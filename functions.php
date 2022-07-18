<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'deenoygundamshop');

class DB_con {
    function __construct()
    {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $this->dbcon = $conn;

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL : " . mysqli_connect_error();
        }
    }

    public function insertUser($firstname, $lastname, $phone_number, $email, $password, $role) {
        $result = mysqli_query($this->dbcon, "INSERT INTO tb_customer(firstname, lastname, phone_number,  email, password, role) VALUES('$firstname', '$lastname', '$phone_number', '$email', '$password', '$role')");
        return $result;
    }

    public function fetchdata() {
        $result = mysqli_query($this->dbcon, "SELECT * FROM tb_customer");
        return $result;
    }

    public function UpdateProfile($firstname, $lastname, $email, $phone_number, $id, $location) {
        $result = mysqli_query($this->dbcon, "UPDATE tb_customer SET firstname = '$firstname', lastname = '$lastname', email = '$email', phone_number = '$phone_number', location = '$location' WHERE customer_id = '$id'");
        return $result;
    }

    public function fetchonerecord($userid) {
        $result = mysqli_query($this->dbcon, "SELECT * FROM tb_customer where customer_id = '$userid'");
        return $result;
    }

    public function fetchoneproduct($productid) {
        $result = mysqli_query($this->dbcon, "SELECT * FROM tb_product where product_id = '$productid'");
        return $result;
    }

    public function updateUser($firstname, $lastname,  $phone_number, $email, $password, $role, $id) {
        $result = mysqli_query($this->dbcon, "UPDATE tb_customer SET firstname = '$firstname', lastname = '$lastname', phone_number = $phone_number, email = '$email', password = '$password', role = '$role' WHERE customer_id = '$id'");
        return $result;
    }

    public function deleteUser($userid) {
        $result = mysqli_query($this->dbcon, "DELETE FROM tb_customer WHERE customer_id = '$userid'");
        return $result;
    }

    public function deleteProduct($productid) {
        $result = mysqli_query($this->dbcon, "DELETE FROM tb_product WHERE product_id = '$productid'");
        return $result;
    }

    public function fetchemployee() {
        $result = mysqli_query($this->dbcon, "SELECT * FROM tb_employee");
        return $result;
    }

    public function fetchsupplier() {
        $result = mysqli_query($this->dbcon, "SELECT * FROM tb_supplier");
        return $result;
    }

    public function fetchProduct() {
        $result = mysqli_query($this->dbcon, "SELECT * FROM tb_product");
        return $result;
    }

    public function insertProduct($image, $name, $price, $amount, $protype_id, $whoupdate) {
        $result = mysqli_query($this->dbcon, "INSERT INTO tb_product(image, name, price, amount, protype_id, whoupdate) VALUES ('$image', '$name', $price, $amount, $protype_id, '$whoupdate')");
        return $result;
    }

    public function updateProduct($name, $price, $amount, $protype_id, $whoupdate, $product_id) {
        $result = mysqli_query($this->dbcon, "UPDATE tb_product SET name = '$name', price = $price, amount = $amount, protype_id = $protype_id, whoupdate = '$whoupdate' WHERE product_id = $product_id");
        return $result;
    }

    public function fetchCart($user_id) {
        @$result = mysqli_query($this->dbcon, "SELECT * FROM tb_cart WHERE user_id = $user_id ORDER BY add_date ASC ");
        return $result;
    }

    public function addToCart($user_id, $product_id, $image, $product_name, $protype_id, $amount, $price, $datetime) {
        @$result = mysqli_query($this->dbcon, "INSERT INTO tb_cart (user_id, product_id, protype_id, image, product_name, amount, price, add_date) VALUES ($user_id, $product_id, $protype_id, '$image', '$product_name', $amount, $price, '$datetime')");
        return $result;
    }

    public function deleteProductInCart($product_id, $user_id) {
        $result = mysqli_query($this->dbcon, "DELETE FROM tb_cart WHERE product_id = $product_id AND user_id = $user_id");
        return $result;
    }

    public function updateToCart($user_id, $product_id, $image, $product_name, $protype_id, $amount, $price, $datetime) {
        $result = mysqli_query($this->dbcon, "UPDATE tb_cart SET user_id = $user_id, product_id = $product_id, protype_id = $protype_id, image = '$image', product_name = '$product_name', amount = $amount, price = $price, add_date = '$datetime' WHERE product_id = $product_id");
        return $result;
    }
    
}

?>