<?php

class Deskripsi extends DB
{
    function getDeskripsiJoin()
    {
        $query = "SELECT * FROM deskripsi JOIN harga ON deskripsi.id_harga=harga.id_harga JOIN stock ON deskripsi.id_stock=stock.id_stock ORDER BY deskripsi.id_deskripsi";

        return $this->execute($query);
    }

    function getDeskripsi()
    {
        $query = "SELECT * FROM deskripsi";
        return $this->execute($query);
    }

    function getDeskripsiById($id)
    {
        $query = "SELECT * FROM deskripsi JOIN harga ON deskripsi.id_harga=harga.id_harga JOIN stock ON deskripsi.id_stock=stock.id_stock WHERE id_deskripsi=$id";

        return $this->execute($query);
    }

    function searchDeskripsi($keyword)
    {
        $query = "SELECT * FROM deskripsi WHERE deskripsi LIKE '%$keyword%'";
        return $this->execute($query);
    }

    function addDeskripsi($data, $file)
    {
        $deskripsi = $data['deskripsi'];
        $query = "INSERT INTO deskripsi VALUES('', '$deskripsi')";
        return $this->executeAffected($query);
    }

    function updateDeskripsi($id, $data, $file)
    {
        $deskripsi = $data['deskripsi'];
        $query = "UPDATE deskripsi SET deskripsi='$deskripsi' WHERE id_deskripsi=$id";
        return $this->executeAffected($query);
    }

    function deleteDeskripsi($id)
    {
        $query = "DELETE FROM deskripsi WHERE id_deskripsi=$id";
        return $this->executeAffected($query);
    }
}
