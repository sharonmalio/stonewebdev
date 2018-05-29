<?php 
namespace Stonelink\Controller;

use Zend\Mvc\Controller\AbstractActionController;

use Zend\View\Model\ViewModel;

use Stonelink\Model\KenyaMaps2015HealthFacilitiesTable;
use Stonelink\Form\AppointmentForm;


class AppointmentsController extends AbstractActionController
{
    
    // Add this property:
    private $table;
    
    // Add this constructor:
    public function __construct(KenyaMaps2015HealthFacilitiesTable $table)
    {
        $this->table = $table;
    }
    
    public function indexAction()
    {
        return new ViewModel([
            'hospitals' => $this->table->fetchAll(),
        ]);
    }

    public function bookappointmentAction()
    
    {
        $form = new AppointmentForm();
        
        $form->get('submit')->setValue('Add');
        
        $request = $this->getRequest();
        
        if (! $request->isPost()) {
            return ['form' => $form];
        }
        $appointment = new appointments();
        $form->setInputFilter($appointment->getInputFilter());
        $form->setData($request->getPost());
        
        if (! $form->isValid()) {
            return ['form' => $form];
        }
        
        $appointment->exchangeArray($form->getData());
        $this->table->saveAlbum($appointment);
        return $this->redirect()->toRoute('stonelink');
    }
    public function editappointmentAction()
    {
        
    }
    
    public function appointmentAction()
    {
        
    }
}