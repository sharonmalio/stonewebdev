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

    public function bookappointmentAction()
    
    {
        return new ViewModel();
//         $request = $this->getRequest();
//         $form = new AppointmentForm();
        
//         $form->get('submit')->setValue('Add');
        
//         var_dump($request);
//         exit();
//         if (! $request->isPost()) {
//             echo "Not Post";
//             exit();
//             return [
//                 'form' => $form
//             ];
//         }
//         return array(
//             'form' => $form
//         );
        // $appointment = new appointments();
        // $form->setInputFilter($appointment->getInputFilter());
        // $form->setData($request->getPost());
        
        // if (! $form->isValid()) {
        // return ['form' => $form];
        // }
        
        // $appointment->exchangeArray($form->getData());
        // $this->table->saveAlbum($appointment);
        // return $this->redirect()->toRoute('stonelink');
    }

    public function editappointmentAction()
    {}

    public function appointmentAction()
    {}
}