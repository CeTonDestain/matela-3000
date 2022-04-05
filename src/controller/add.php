<?php
class AddController
{
    public function __construct(AddModel $model)
    {
        $this->model = $model;
    }
    public function getAll()
    {
        $query=$this->model->db->query("SELECT * FROM catalogue");
        $data=$query->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
    public function addCatalogue($name,$size,$image,$price,$promotion)
    {
        $query=$this->model->db->prepare("INSERT INTO catalogue
        (name,size,img,price,promotion)
        VALUES
        (:name,:size,:image,:price,:promotion)");

        $query->bindParam(":name",$name);
        $query->bindParam(":size",$size);
        $query->bindParam(":image",$image);
        $query->bindParam(":price",$price,PDO::PARAM_INT);
        $query->bindParam(":promotion",$promotion,PDO::PARAM_INT);

        $query->execute();
    }
    public function deleteOne($id){
        $query=$this->model->db->prepare("DELETE FROM catalogue
        WHERE id=:id");
        $query->bindParam(":id",$id);
        $query->execute();
    }
   public function modify($name,$size,$image,$price,$promotion,$id){
    $query=$this->model->db->prepare("Update catalogue
                                    SET
                                    name=:name,
                                    img=:image,
                                    size=:size,
                                    price=:price,
                                    promotion=:promotion
                                    WHERE id=:id");

    $query->bindParam(":name",$name);
    $query->bindParam(":size",$size);
    $query->bindParam(":image",$image);
    $query->bindParam(":price",$price,PDO::PARAM_INT);
    $query->bindParam(":promotion",$promotion,PDO::PARAM_INT);
    $query->bindParam(":id",$id,PDO::PARAM_INT);

    $query->execute();
   }
}

