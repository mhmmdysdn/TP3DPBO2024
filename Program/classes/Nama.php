<?php

class Nama extends DB
{
    function getNama()
    {
        $query = "SELECT * FROM nama";
        return $this->execute($query);
    }

    function getNamaById($id)
    {
        $query = "SELECT * FROM nama WHERE id_nama=$id";
        return $this->execute($query);
    }

    function addNama($data)
    {
        $nama = $data['nama_barang'];
        $query = "INSERT INTO nama VALUES('', '$nama')";
        return $this->executeAffected($query);
    }

    function updateNama($id, $data)
    {
        $nama = $data['nama_barang'];
        $query = "UPDATE nama SET nama_barang='$nama' WHERE id_nama=$id";
        return $this->executeAffected($query);
    }

    function deleteNama($id)
    {
        $query = "DELETE FROM nama WHERE id_nama=$id";
        return $this->executeAffected($query);
    }
}
