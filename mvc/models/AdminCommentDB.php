<?php

class AdminCommentDB extends DB
{
    public function getAll()
    {
        $array ="SELECT `review`.product_id, `review`.mark as mark, `accounts`.full_name as m_name, `review`.member_id as m_id ,`product`.name as p_name,`accounts`.phone_number as phone,`review`.comments as comments
        FROM `review`
        JOIN `accounts` ON `review`.member_id = `accounts`.id
        JOIN `product` ON `review`.product_id= `product`.id;";
        $array = mysqli_query($this->connect, $array);
        $result = [];
        while ($s = mysqli_fetch_array($array, MYSQLI_ASSOC)) {
            array_push($result, $s);
        }
        if ($result)
            return $result;
        else return [];
    }
    function deleteComment($id,$m_id)
    {
        $sql = "DELETE FROM `review` where product_id = $id and member_id = '$m_id' ";
        $res = $this->connect->query($sql);
        return $res;
    }
    public function listcomment()
    {
        $array ="SELECT `product`.id as id,`product`.name as name, COUNT(`product`.id) as n_comment ,ROUND(AVG(`review`.`mark`),2) as marks from `review` JOIN `product` on `product`.`id` = `review`.`product_id` GROUP BY `product`.`name`;";
        $array = mysqli_query($this->connect, $array);
        $result = [];
        while ($s = mysqli_fetch_array($array, MYSQLI_ASSOC)) {
            array_push($result, $s);
        }
        if ($result)
            return $result;
        else return [];
    }
}