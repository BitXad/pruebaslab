<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Tipo_prueba extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tipo_prueba_model');
        $this->load->model('Usuario_model');
    } 

    /*
     * Listing of tipo_prueba
     */
    function index()
    {
        /************************** CABECERA SESSION ************************************/            
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if($session_data['tipousuario_id']==1){        
                $usuario_id = $session_data['usuario_id'];
        /************************** CABECERA SESSION ************************************/            
                
        
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('tipo_prueba/index?');
        $config['total_rows'] = $this->Tipo_prueba_model->get_all_tipo_prueba_count();
        $this->pagination->initialize($config);
        $data['usuario'] = $this->Usuario_model->get_usuario(1);
        
        $data['tipo_prueba'] = $this->Tipo_prueba_model->get_all_tipo_prueba($params);
        
        $data['_view'] = 'tipo_prueba/index';
        $this->load->view('layouts/main',$data);
        
        /************************** FIN CABECERA SESSION ************************************/            
                }else{
                $url = base_url("login");
                header("Location: .$url");
                die();
            }
        } else {redirect('login', 'refresh'); }            
        /*************************** FIN CABECERA SESSION ***********************************/            
               
        
    }

    /*
     * Adding a new tipo_prueba
     */
    function add()
    {   
        
        /************************** CABECERA SESSION ************************************/            
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if($session_data['tipousuario_id']==1){        
                $usuario_id = $session_data['usuario_id'];
        /************************** CABECERA SESSION ************************************/            
                        
        
        $data['usuario'] = $this->Usuario_model->get_usuario(1);
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'tipoprueba_descripcion' => $this->input->post('tipoprueba_descripcion'),
				'tipoprueba_precio' => $this->input->post('tipoprueba_precio'),
            );
            
            $tipo_prueba_id = $this->Tipo_prueba_model->add_tipo_prueba($params);
            redirect('tipo_prueba/index');
        }
        else
        {            
            $data['_view'] = 'tipo_prueba/add';
            $this->load->view('layouts/main',$data);
        }
        
        /************************** FIN CABECERA SESSION ************************************/            
                }else{
                $url = base_url("login");
                header("Location: .$url");
                die();
            }
        } else {redirect('login', 'refresh'); }            
        /*************************** FIN CABECERA SESSION ***********************************/            
               
        
    }  

    /*
     * Editing a tipo_prueba
     */
    function edit($tipoprueba_id)
    {   
        
        /************************** CABECERA SESSION ************************************/            
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if($session_data['tipousuario_id']==1){        
                $usuario_id = $session_data['usuario_id'];
        /************************** CABECERA SESSION ************************************/            
                    
        // check if the tipo_prueba exists before trying to edit it
        $data['tipo_prueba'] = $this->Tipo_prueba_model->get_tipo_prueba($tipoprueba_id);
        $data['usuario'] = $this->Usuario_model->get_usuario(1);
        if(isset($data['tipo_prueba']['tipoprueba_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'tipoprueba_descripcion' => $this->input->post('tipoprueba_descripcion'),
					'tipoprueba_precio' => $this->input->post('tipoprueba_precio'),
                );

                $this->Tipo_prueba_model->update_tipo_prueba($tipoprueba_id,$params);            
                redirect('tipo_prueba/index');
            }
            else
            {
                $data['_view'] = 'tipo_prueba/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The tipo_prueba you are trying to edit does not exist.');
        
        
        /************************** FIN CABECERA SESSION ************************************/            
                }else{
                $url = base_url("login");
                header("Location: .$url");
                die();
            }
        } else {redirect('login', 'refresh'); }            
        /*************************** FIN CABECERA SESSION ***********************************/            
               
        
    } 

    /*
     * Deleting tipo_prueba
     */
    function remove($tipoprueba_id)
    {
        /************************** CABECERA SESSION ************************************/            
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if($session_data['tipousuario_id']==1){        
                $usuario_id = $session_data['usuario_id'];
        /************************** CABECERA SESSION ************************************/            

        $tipo_prueba = $this->Tipo_prueba_model->get_tipo_prueba($tipoprueba_id);

        // check if the tipo_prueba exists before trying to delete it
        if(isset($tipo_prueba['tipoprueba_id']))
        {
            $this->Tipo_prueba_model->delete_tipo_prueba($tipoprueba_id);
            redirect('tipo_prueba/index');
        }
        else
            show_error('The tipo_prueba you are trying to delete does not exist.');
    
            /************************** FIN CABECERA SESSION ************************************/            
                }else{
                $url = base_url("login");
                header("Location: .$url");
                die();
            }
        } else {redirect('login', 'refresh'); }            
        /*************************** FIN CABECERA SESSION ***********************************/            
           
    }
    
    
    
}
