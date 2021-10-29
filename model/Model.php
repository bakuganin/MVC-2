<?php
    class Model{

        public function getBook($title){
            $allBook = Model::getBookList();
            $i = 0;
            $test = array(false);
            foreach ($allBook as $oneBook) {
                if($oneBook['bookname'] ==$title){
                    $test = array(true, $allBook[$i]);
                    return $test;
                }
                $i++;
            }
            return $test;
        }

        public function getBookList() {
        //     include_once 'model/booksArray.php';
        //     return $books;
        // }

        $mysqli = new mysqli('localhost', 'root', '', 'blogjegorbakunin');

        if(mysqli_connect_errno()) {
            print_f('Соединение не установлено...');
            exit();
        }

        $mysqli->set_charset('utf8mb4_general_ci');

        $query = "SELECT * FROM bookarray";

        $result = $mysqli-> query($query);
        $books = $result->fetch_all(MYSQLI_ASSOC);

        return $books;
    }
}
?>