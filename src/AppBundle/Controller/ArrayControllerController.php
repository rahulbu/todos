<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Arraytest;
use AppBundle\Entity\Messages;
use AppBundle\Entity\MessagesMapper;
use Doctrine\Common\Persistence\ManagerRegistry as Doctrine;
use SplFileObject;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;

class ArrayControllerController extends Controller
{
    private $doctrine;
//    private $container;

    public function __construct(Doctrine $doctrine)
    {
        $this->doctrine = $doctrine;
//        $this->container = $container;
    }

    /**
     * @Route("/insert")
     */
    public function insertAction() {
        $er = $this->doctrine->getRepository('AppBundle:Arraytest');
        $em = $this->doctrine->getEntityManager();

        $arrayObj = new Arraytest();
        $arrayObj->setArrayField(array('1' => 'abc','2'=> 'efg'));

        $messageObj = new Messages();
        $messageObj->setName("name");
        $messageObj->setMessage("message");
        $em->persist($messageObj);
        $messageMapper = new MessagesMapper();
        $messageMapper->setMessageId($messageObj);
        $messageMapper->setCountryCode('I');
        $messageMapper->setContext('common');
        $messageMapper->setCommunicationType('sms');
        $messageMapper->setEntity('doctr');
        $messageMapper->setIsMagicLink(true);
        $messageMapper->setHsmDataFields(array(
            'doctor_name',
            'practice_name',
            'magic_link',
        ));
        $messageMapper->setType('');

        $em->persist($messageMapper);

//        $em->persist($arrayObj);
        $em->flush();


        return $this->json(array("message" => "done"));
    }

    /**
     * @Route("/show", methods={"GET","POST"})
     */
    public function showAction(Request $request){
        $request = $this->container->get('request_stack')->getCurrentRequest();
        $postData = $request->query->all();
//        $file = $request->files->get("csvfile");
//        $form = $this->createFormBuilder()
//                ->add('filename',FileType::class,array("class" => "form-control"))
//                ->getForm();
//        $form->handleRequest($request);
//        if ($form->isSubmitted() && $form->isValid()) {
//            $file = $request->files->get('filename');
//            $contents = "nothing";
//            $fileObj = new \SplFileObject($file);
//            $fileObj->setFlags(\SplFileObject::READ_CSV);
//            $fileObj->setMaxLineLen(1024);
//            $filehash = uniqid().hash('md5',  (time()).$fileObj->getFilename());
//            $uploadPath = "/wave/respondees/".$filehash.".".($file->getClientOriginalExtension());
//            if (isset($file))
//                return $this->json(['count'=> ($fileObj->getMaxLineLen()),
//                    "name" => $filehash,
//                    "uploadPath" => $uploadPath,
//                    "time" => time(),
//                    "contents" => $fileObj->fgetcsv(),
//                    "rows" => $this->validateCsvFile($fileObj),
//                    "ext" => $file->getClientOriginalExtension()]
//                );
//            if(isset($file))
//                $contents = file_get_contents($file);
//
//            return $this->json(["file"=> isset($file), "mes" => $contents]);
//        }

        $con = 123456;
$data[123456] = true;
 //       return $this->json($data,200);
//return new Response($con, 200);
        return $this->json(strval(1234),200);
        //$by = unpack("c", $body);
        $res = hash_hmac("sha1", $body, $secret);
        //$res1 = hash_hmac("sha1", $by, $secret);
        $res1 = hash_hmac("sha1", $body1, $secret);
        $res3 = hash_hmac("sha1", $body3, $secret);
        return $this->json(["hmac" => $res, "body" => $body, "check" => $body == $body1, "res1" => $res1, "body1" => json_encode($body1), "body3Hmac" => $res3]);

        $a = 6;
        $b = 2;
        $c = 4;
        $d = 8;
        return $this->json(["ansb" => ($a & $b), "ansc" => ($a & $c), "ansd" => ($a & $d)]);

        $string = "hi";
        $ar = ["boi"];
        $js = json_encode($string);
        $js = json_encode($ar);
        $field = 'bye';
        $ar[$field] = null;
        $ar['mes'] = "Hey %s,\nThank you for availing a FREE online consultation during the India Health Hour. \nYou have taken a new step towards staying healthy by adopting telemedicine. Tell your loved ones about your FREE consult experience on Practo and help them stay healthy!\nLink: %s\nStay Home, Stay Safe, Stay Healthy\nTeam Practo";
//        return $this->json($ar);
//return new response(sprintf($ar['mes'], "hi", "bye"));
        $tes = ["user_info_id" => 6];
        $hi = array("user_info_id" => 6);
        $en = json_encode($hi);
        $ans = json_decode($en, true);
        $hsm_template = "Hey {{1}},\nThank you for availing a FREE online consultation during the India Health Hour1F553\nWe hope your experience was great1F601\nYou have taken a new step towards staying healthy by adopting telemedicine1F4F1 1F467 and we hope you continue to do so! 1F4AA\n\nYou can consult top doctors on Practo for any of your health concerns. Tell your loved ones about your FREE consult experience on Practo and help them stay healthy! Visit: {{2}}\n\nStay Home, Stay Safe, Stay Healthy\nTeam Practo";
        $hsm = "Hey {{1}},
Thank you for availing a FREE online consultation during the India Health Hour🕓 
We hope your experience was great😁
You have taken a new step towards staying healthy by adopting telemedicine📱👩🏻‍⚕ and we hope you continue to do so! 💪🏻

You can consult top doctors on Practo for any of your health concerns. Tell your loved ones about your FREE consult experience on Practo and help them stay healthy! Visit: {{2}}

Stay Home, Stay Safe, Stay Healthy
Team Practo";

        $hs = hash('sha256', sprintf($hsm_template));
        $og = "Hey {{1}},
Thank you for availing a FREE online consultation during the India Health Hour1F553
We hope your experience was great1F601
You have taken a new step towards staying healthy by adopting telemedicine1F4F1 1F467 and we hope you continue to do so! 1F4AA

You can consult top doctors on Practo for any of your health concerns. Tell your loved ones about your FREE consult experience on Practo and help them stay healthy! Visit: {{2}}

Stay Home, Stay Safe, Stay Healthy
Team Practo";
        $emtemp = "Hey {{1}},\nThank you for availing a FREE online consultation during the India Health Hour🕓 \nWe hope your experience was great😁\nYou have taken a new step towards staying healthy by adopting telemedicine📱👩🏻‍⚕ and we hope you continue to do so! 💪🏻\n\nYou can consult top doctors on Practo for any of your health concerns. Tell your loved ones about your FREE consult experience on Practo and help them stay healthy! Visit: {{2}}\n\nStay Home, Stay Safe, Stay Healthy\nTeam Practo";

        $test = "Hey {{1}},\nThank you for availing a FREE online consultation during the India Health Hour1F553\nWe hope your experience was great1F601\nYou have taken a new step towards staying healthy by adopting telemedicine1F4F1 1F467 and we hope you continue to do so! 1F4AA\n\nYou can consult top doctors on Practo for any of your health concerns. Tell your loved ones about your FREE consult experience on Practo and help them stay healthy! Visit: {{2}}\n\nStay Home, Stay Safe, Stay Healthy\nTeam Practo";
        $boi = "Hey {{1}},\nThank you for availing a FREE online consultation during the India Health Hour1F553\nWe hope your experience was great1F601\nYou have taken a new step towards staying healthy by adopting telemedicine1F4F1 1F467 and we hope you continue to do so! 1F4AA\n\nYou can consult top doctors on Practo for any of your health concerns. Tell your loved ones about your FREE consult experience on Practo and help them stay healthy!1F44C\nVisit: {{2}}\n\nStay Home, Stay Safe, Stay Healthy\nTeam Practo";
        $emojihash = hash('sha256', sprintf($boi));
//                return $this->json(["data" => sprintf($boi), "sprintHash" => $emojihash, "truth" => sprintf($hsm_template) === $og, "date" => date('Y-m-d', strtotime('-15 days'))]);
//        $params["basePath"] = $this->container->get('kernel')->getRootDir()."/Resources/views";
//        /Users/rahulbu/PhpstormProjects/ToDo/app/Resources/views/provider_consumer
        $params["basePath"] = '';
        $params["doctor_name"] = 'dyamn';
        $params["patient_name"] = 'boo';
        $params["link"] = 'www.google.com';
        //return $this->render('provider.html.twig',$params);
$deletedVNs = [];
$obtainedVNs = [['vn_id' => 4, "vn_number" => "09248"],["vn_id" => 0]];
        $numbersToDelete = [['vn_id' => 0],['vn_id'=>2],['vn_id' => 3]];
        foreach ($numbersToDelete as $number) {
            $data["vn_id"] = $number['vn_id'];
            if (($key = array_search($data["vn_id"], array_column($obtainedVNs, "vn_id"))) !== false) {
//                array_push($deletedVNs,["key" => $key, "value" => $data["vn_id"]]);
                unset($obtainedVNs[$key]);
                continue;
            }
            array_push($deletedVNs, $data);
        }

//        return $this->json(["delete" => $deletedVNs, "obtain" => $obtainedVNs]);
        $positiveCount = 91;
        $totalPositiveCount = 98;
        $percent = round((($positiveCount * 100) / $totalPositiveCount), 2);

        $data = array();
        $data["total"] = "total";
        $data["mcq"] = "Mcq";
        $sub = array("jan" => array("data_for" => "jan"), "feb" => array("data_for" => "feb"));
        $result =  array_merge($data, $sub);
$jsString = "{\"total\":{\"overall_positive\":0,\"overall_negative\":0,\"last_updated\":\"2020-06-04 12:28:48\"},\"tagged_recommendation\":{\"yes_recommendation_count\":0},\"mcq_information\":{\"DOCTOR_FRIENDLINESS\":0,\"EXPLANATION_OF_ISSUE\":0,\"TREATMENT_SATISFACTION\":0,\"VALUE_FOR_MONEY\":0,\"WAIT_TIME\":0},\"2020_06\":{\"overall_positive\":0,\"overall_negative\":0,\"last_updated\":\"2020-06-04 12:28:48\",\"data_for\":\"Jun,2020\"},\"2020_05\":{\"overall_positive\":0,\"overall_negative\":0,\"last_updated\":\"2020-06-04 12:28:48\",\"data_for\":\"May,2020\"},\"2020_04\":{\"overall_positive\":0,\"overall_negative\":0,\"last_updated\":\"2020-06-04 12:28:48\",\"data_for\":\"Apr,2020\"},\"2020_03\":{\"overall_positive\":0,\"overall_negative\":0,\"last_updated\":\"2020-06-04 12:28:48\",\"data_for\":\"Mar,2020\"},\"2020_02\":{\"overall_positive\":0,\"overall_negative\":0,\"last_updated\":\"2020-06-04 12:28:48\",\"data_for\":\"Feb,2020\"},\"2020_01\":{\"overall_positive\":0,\"overall_negative\":0,\"last_updated\":\"2020-06-04 12:28:48\",\"data_for\":\"Jan,2020\"},\"2019_12\":{\"overall_positive\":0,\"overall_negative\":0,\"last_updated\":\"2020-06-04 12:28:48\",\"data_for\":\"Dec,2019\"},\"2019_11\":{\"overall_positive\":0,\"overall_negative\":0,\"last_updated\":\"2020-06-04 12:28:48\",\"data_for\":\"Nov,2019\"},\"2019_10\":{\"overall_positive\":0,\"overall_negative\":0,\"last_updated\":\"2020-06-04 12:28:48\",\"data_for\":\"Oct,2019\"},\"2019_09\":{\"overall_positive\":0,\"overall_negative\":0,\"last_updated\":\"2020-06-04 12:28:48\",\"data_for\":\"Sep,2019\"},\"2019_08\":{\"overall_positive\":0,\"overall_negative\":0,\"last_updated\":\"2020-06-04 12:28:48\",\"data_for\":\"Aug,2019\"},\"2019_07\":{\"overall_positive\":0,\"overall_negative\":0,\"last_updated\":\"2020-06-04 12:28:48\",\"data_for\":\"Jul,2019\"}}";
$yes = null;
if (!$yes && $jsString)
    return $this->json("it works");
return $this->json(json_decode($jsString));
//        $qb = $this->getDoctrine()->getManager()->createQueryBuilder();
//        $qb->select('sra.answer, count(sra.answer) as answer_count')
//            ->from('ValidSurvey', 'vs')
//            ->join('vs.survey', 's')
//            ->join('s.surveyResponses', 'sr')
//            ->join('sr.campaignQuestion', 'cq')
//            ->join('cq.question', 'q')
//            ->join('sr.surveyResponseAnswers', 'sra')
//            ->where('q.type = :questionType')
//            ->andwhere('vs.entityId = :entityId')
//            ->andWhere('s.entity = :entity')
//            ->andWhere('s.isSpam = false')
//            ->andWhere('s.userVerified = true')
//            ->andWhere('s.isContested = false')
//            ->groupBy('sra.answer')
//            ->setParameter('questionType', "MCQ")
//            ->setParameter('entityId', "4")
//            ->setParameter('entity', "doctor");
//        return $this->json(["yes" => $qb->getQuery()->getSql()]);
                //        return new response(sprintf($emtemp));
        //        $id = $this->doctrine->getRepository('AppBundle:MessagesMapper')->findOneBy(array('id' => 14));
//        return $this->json($id->getHsmDataFields());
//        return $this->json(["mes" => (null || null)]);
//        $post['data'] = array("yes" => 1);
//        if(!isset($post['data']) && !is_array($post['data']) ) {
//        return $this->json(["mes" => "parameter required"]);
//        }
//        $postData['respondees'] = array("yes" => 1);
//        $postData['data'] = [];
//        if (!isset($postData['respondees']) && !is_array($postData['respondees'])) {
//            return View::create(array("respondees" => "Required parameter"), Codes::HTTP_BAD_REQUEST);
//        }
//        return $this->json(["mes" => $request, "request" => $postData]);

//        return $this->json($this->doctrine->getRepository('AppBundle:Messages')->findOneBy(array('id' => $id))->getName());
//        return $this->json($this->doctrine->getRepository('AppBundle:Arraytest')->findOneBy(array('id' => 2))->getArrayField());
    }

    /**
     * @param int $value
     * @return mixed
     */
    public function getAl($value)
    {
        return $value;
    }

    public function validateCsvFile($fileObj)
    {
        $fileObj->setFlags(SplFileObject::READ_CSV);
        $fileObj->setMaxLineLen(1024);
        if (!$fileObj->valid()) {
            throw new BadRequestHttpException("File is empty");
        }
        $columnCount = count($fileObj->current());
        if ($columnCount < 1) {
            throw new BadRequestHttpException("Uploaded file should contain at least one column");
        }
        $fileObj->next();
        $totalRows = 0;
        while ($fileObj->valid()) {
            $totalRows += 1;
            if ($columnCount != count($fileObj->current())) {
                throw new BadRequestHttpException("Not all rows have equal columns");
            }
            $fileObj->next();
        }
        if ($totalRows < 1) {
            throw new BadRequestHttpException("File should have at least a single data row along with column headers");
        }
        $fileObj->rewind();
        return $totalRows;
    }

}
