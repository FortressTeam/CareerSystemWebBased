<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Feedbacks Controller
 *
 * @property \App\Model\Table\FeedbacksTable $Feedbacks
 */
class FeedbacksController extends AppController
{

    /**
     * Monthly method
     *
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function month()
    {
        $dataByMonth = $this->Feedbacks->find();
        $month = $dataByMonth->func()->month([
            'feedback_date' => 'literal'
        ]);
        $dataByMonth
            ->select([
                'monthSubmited' => 'feedback_date',
                'totalFeedbacks' => $dataByMonth->func()->count('Feedbacks.id')
            ])
            ->where(function($exp, $q){
                $year = $q->func()->year([
                    'feedback_date' => 'literal'
                ]);
                return $exp->eq($year, 2016);
            })
            ->group($month);
        $this->set(compact('dataByMonth'));
        $this->set('_serialize', ['dataByMonth']);
    }

    /**
     * By Type method
     *
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function type()
    {
        $dataByType = $this->Feedbacks->find();
        $dataByType
        	->contain(['FeedbackTypes'])
        	->select([
        		'label' => 'FeedbackTypes.feedback_type_name',
                'value' => $dataByType->func()->count('Feedbacks.id')
        	])
            ->where(function($exp, $q){
                $year = $q->func()->year([
                    'feedback_date' => 'literal'
                ]);
                return $exp->eq($year, 2016);
            })
            ->group(['FeedbackTypes.id']);
        $this->set(compact('dataByType'));
        $this->set('_serialize', ['dataByType']);
    }

}