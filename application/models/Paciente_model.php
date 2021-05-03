<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Paciente_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get paciente by paciente_id
     */
    function get_paciente($paciente_id)
    {
        $paciente = $this->db->query("
            SELECT
                *

            FROM
                `paciente`

            WHERE
                `paciente_id` = ?
        ",array($paciente_id))->row_array();

        return $paciente;
    }
    
    /*
     * Get paciente by paciente_id
     */
    function get_paciente_inicial()
    {
        $sql = "select 
                0 as paciente_id,
                1 as estado_id,
                1 as genero_id,
                1 as extencion_id,
                'SIN NOMBRE' as paciente_nombre,
                0 as paciente_edad,
                'N/A' as paciente_direccion,
                0 as paciente_ci";
        
        $paciente = $this->db->query($sql)->row_array();
        return $paciente;
    }
    
    /*
     * Get all paciente count
     */
    function get_all_paciente_count()
    {
        $paciente = $this->db->query("
            SELECT
                count(*) as count

            FROM
                `paciente`
        ")->row_array();

        return $paciente['count'];
    }
        
    /*
     * Get all paciente
     */
    function get_all_paciente($params = array())
    {
        $limit_condition = "";
        if(isset($params) && !empty($params))
            $limit_condition = " LIMIT " . $params['offset'] . "," . $params['limit'];
        
        $paciente = $this->db->query("
            SELECT
                *

            FROM
                `paciente`

            WHERE
                1 = 1

            ORDER BY `paciente_id` DESC

            " . $limit_condition . "
        ")->result_array();

        return $paciente;
    }
        
    /*
     * function to add new paciente
     */
    function add_paciente($params)
    {
        $this->db->insert('paciente',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update paciente
     */
    function update_paciente($paciente_id,$params)
    {
        $this->db->where('paciente_id',$paciente_id);
        return $this->db->update('paciente',$params);
    }
    
    /*
     * function to delete paciente
     */
    function delete_paciente($paciente_id)
    {
        return $this->db->delete('paciente',array('paciente_id'=>$paciente_id));
    }
}
