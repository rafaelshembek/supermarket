<?php
// =============
//  REQUIRES_ONCE()
// =============
require_once('Select_DB.php');

class IMG_avatar{

    private $img;
    private $id_img;

    public function get_avatar($id_user){
        $params = array(
            'id_user' => $id_user
        );
        $select = new Select_DB();
        $el = $select->exe_query("SELECT * FROM img_avatar WHERE img_avatar.id_user = :id_user", $params);

        foreach($el as $value){
            $img_avatar = $value['avatar'];
            $id_avatar = $value['id_avatar'];
        }
        if($el != null){
            $this->setImg($img_avatar);
            $this->setId_img($id_avatar);
        }
    }

    public function getImg()
    {
        return $this->img;
    }
    public function setImg($img)
    {
        $this->img = $img;
    } 
    public function getId_img()
    {
        return $this->id_img;
    }
    public function setId_img($id_img)
    {
        $this->id_img = $id_img;
    }
}

?>