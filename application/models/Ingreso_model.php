<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */
 
class Ingreso_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get ingreso by ingreso_id
     */
    function get_ingreso($ingreso_id)
    {
        return $this->db->get_where('ingresos',array('ingreso_id'=>$ingreso_id))->row_array();
    }
    
     function get_ingresos($ingreso_id)
    {
         $ingresos = $this->db->query("
            SELECT
                i.*, u.*

            FROM
                ingresos i, usuario u

            WHERE
                i.usuario_id = u.usuario_id
                and i.ingreso_id=".$ingreso_id."

            ORDER BY `ingreso_id` DESC

            
        ")->result_array();

        return $ingresos;
    }
    
    /*
     * Get all ingresos
     */
    function get_all_ingresos()
    {
        
        
        $ingresos = $this->db->query("
            SELECT
                i.*, u.*, f.ingreso_id as 'ingres', f.factura_id

            FROM
                ingresos i
            LEFT JOIN usuario u on i.usuario_id=u.usuario_id
            LEFT JOIN  factura f on i.ingreso_id=f.ingreso_id

            WHERE
                1=1

            ORDER BY `ingreso_fecha` DESC

          
        ")->result_array();

        return $ingresos;
    }

    function mesango()
    {
        
        $dia = $this->db->query("SELECT compra_fecha FROM compra where compra.compra_fecha >= '2019-04-22' ")->result_array();
        return $dia;
    }

    function mesao()
    {
        
        $dia = $this->db->query("SELECT compra_fecha FROM compra where compra.compra_fecha >= '2019-04-22' ")->row_array();
        return $dia;
    }
    
   function numero()
    {
        
        $numrec = $this->db->query("SELECT * FROM parametros")->result_array();
        return $numrec;
    }
     function nombre()
    {
        
        $nom = $this->db->query("SELECT * FROM usuario")->result_array();
        return $nom;
    }
    
     function fechaingreso($condicion,$categoria)
    {

            

       $ingreso = $this->db->query("
        SELECT
               i.*, u.*, f.ingreso_id as 'ingres', f.factura_id
            FROM
                ingresos i
            LEFT JOIN usuario u on i.usuario_id=u.usuario_id
            LEFT JOIN  factura f on i.ingreso_id=f.ingreso_id
            WHERE
                1=1
               
                ".$condicion." 
                ".$categoria."
                
            ORDER BY i.ingreso_fecha DESC 
        "
        )->result_array();

        return $ingreso;
    }
    /*
     * function to add new ingreso
     */
    function add_ingreso($params)
    {
        $this->db->insert('ingresos',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update ingreso
     */
    function update_ingreso($ingreso_id,$params)
    {
        $this->db->where('ingreso_id',$ingreso_id);
        $response = $this->db->update('ingresos',$params);
        if($response)
        {
            return "ingreso updated successfully";
        }
        else
        {
            return "Error occuring while updating ingreso";
        }
    }
    
    /*
     * function to delete ingreso
     */
    function delete_ingreso($ingreso_id)
    {
        $response = $this->db->delete('ingresos',array('ingreso_id'=>$ingreso_id));
        if($response)
        {
            return "ingreso deleted successfully";
        }
        else
        {
            return "Error occuring while deleting ingreso";
        }
    }

    function ejecutar($sql){
         
        $this->db->query($sql);
        return $this->db->insert_id();
    }
}