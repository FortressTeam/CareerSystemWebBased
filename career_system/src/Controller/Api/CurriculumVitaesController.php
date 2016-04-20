<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * CurriculumVitaes Controller
 *
 * @property \App\Model\Table\CurriculumVitaesTable $CurriculumVitaes
 */
class CurriculumVitaesController extends AppController
{

    public function add()
    {


        $this->loadModel('Applicants');
        $applicant = $this->Applicants->get($this->request->data['applicant_id'], [
            'contain' => ['Majors', 'PersonalHistory', 'Users', 'Skills', 'Hobbies']
        ]);
        $data = [
            'cvdata' => [
                "major" => $applicant->major->major_name,
                "objective" => $applicant->applicant_objective,
                "educations" => [],
                "experiences" => [],
                "activities" => [],
                "awards" => [],
                "skills" => [],
                "hobbies" => []
            ]
        ];
        foreach ($applicant->personal_history as $personal_history):
            if($personal_history->personal_history_type_id === 1):
                $data['cvdata']['educations'][] = [
                    "education_title" => $personal_history->personal_history_title,
                    "education_detail" => $personal_history->personal_history_detail,
                    "education_start" => $personal_history->personal_history_start,
                    "education_end" => $personal_history->personal_history_end
                ];
            elseif($personal_history->personal_history_type_id === 2):
                $data['cvdata']['experiences'][] = [
                    "experience_title" => $personal_history->personal_history_title,
                    "experience_detail" => $personal_history->personal_history_detail,
                    "experience_start" => $personal_history->personal_history_start,
                    "experience_end" => $personal_history->personal_history_end
                ];
            elseif($personal_history->personal_history_type_id === 3):
                $data['cvdata']['activities'][] = [
                    "activity_title" => $personal_history->personal_history_title,
                    "activity_detail" => $personal_history->personal_history_detail,
                    "activity_start" => $personal_history->personal_history_start,
                    "activity_end" => $personal_history->personal_history_end
                ];
            elseif($personal_history->personal_history_type_id === 4):
                $data['cvdata']['awards'][] = [
                    "award_title" => $personal_history->personal_history_title,
                    "award_detail" => $personal_history->personal_history_detail,
                    "award_date" => $personal_history->personal_history_start
                ];
            endif;
        endforeach;
        foreach ($applicant->skills as $skill):
            $data['cvdata']['skills'][] = [
                "skill_name" => $skill->skill_name,
                "skill_level" => $skill->_joinData->skill_level
            ];
        endforeach;
        foreach ($applicant->hobbies as $hobby):
            $data['cvdata']['hobbies'][] = [
                "hobby_name" => $hobby->hobby_name
            ];
        endforeach;
        $this->request->data['curriculum_vitae_name'] = 'Undefine';
        $this->request->data['curriculum_vitae_data'] = json_encode($data);


        $curriculumVitae = $this->CurriculumVitaes->newEntity();
        if ($this->request->is('post')) {
            $curriculumVitae = $this->CurriculumVitaes->patchEntity($curriculumVitae, $this->request->data);
            if ($this->CurriculumVitaes->save($curriculumVitae)) {
                $message = 'Saved';
            } else {
                $message = 'Error';
            }
        }
        $this->set(compact('message', 'curriculumVitae'));
        $this->set('_serialize', ['message', 'curriculumVitae']);
    }


    public function edit($id = null)
    {
        $curriculumVitae = $this->CurriculumVitaes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $curriculumVitae = $this->CurriculumVitaes->patchEntity($curriculumVitae, $this->request->data);
            if ($this->CurriculumVitaes->save($curriculumVitae)) {
                $message = 'Saved';
            } else {
                $message = 'Error';
            }
        }

        $this->set(compact('message', 'curriculumVitae'));
        $this->set('_serialize', ['message', 'curriculumVitae']);
    }
}
