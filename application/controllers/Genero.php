<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Genero extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Genero_model');
        $this->load->model('Usuario_model');
    } 

    /*
     * Listing of genero
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('genero/index?');
        $config['total_rows'] = $this->Genero_model->get_all_genero_count();
        $this->pagination->initialize($config);

        $data['genero'] = $this->Genero_model->get_all_genero($params);
        $data['usuario'] = $this->Usuario_model->get_usuario(1);
        
        $data['_view'] = 'genero/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new genero
     */
    function add()
    {   $data['usuario'] = $this->Usuario_model->get_usuario(1);
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'genero_nombre' => $this->input->post('genero_nombre'),
            );
            
            $genero_id = $this->Genero_model->add_genero($params);
            redirect('genero/index');
        }
        else
        {            
            $data['_view'] = 'genero/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a genero
     */
    function edit($genero_id)
    {   
        // check if the genero exists before trying to edit it
        $data['genero'] = $this->Genero_model->get_genero($genero_id);
        $data['usuario'] = $this->Usuario_model->get_usuario(1);

        if(isset($data['genero']['genero_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'genero_nombre' => $this->input->post('genero_nombre'),
                );

                $this->Genero_model->update_genero($genero_id,$params);            
                redirect('genero/index');
            }
            else
            {
                $data['_view'] = 'genero/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The genero you are trying to edit does not exist.');
    } 

    /*
     * Deleting genero
     */
    function remove($genero_id)
    {
        $genero = $this->Genero_model->get_genero($genero_id);

        // check if the genero exists before trying to delete it
        if(isset($genero['genero_id']))
        {
            $this->Genero_model->delete_genero($genero_id);
            redirect('genero/index');
        }
        else
            show_error('The genero you are trying to delete does not exist.');
    }
    
}
