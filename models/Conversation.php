<?php
namespace models;

use helper\DB;
use PDO;



class Conversation
{
    private ?int $id;
    private ?int $customer_id;
    private ?string $date;
    private ?string $conversation;

    /**
     * @param int|null $id
     * @param int|null $customer_id
     * @param string|null $date
     * @param string|null $conversation
     */
    public function __construct( ?int $customer_id, ?string $date, ?string $conversation,?int $id)
    {
        $this->id = $id;
        $this->customer_id = $customer_id;
        $this->date = $date;
        $this->conversation = $conversation;
    }

    /**
     * @return Conversation[]
     */
    public static function all($customerId=null){
        $pdo=DB::getDB();
        if($customerId==null){
            $stm=$pdo->prepare("SELECT * FROM contact_information ORDER BY name");
        }else{
            $stm=$pdo->prepare("SELECT * FROM contact_information WHERE customer_id=?");
            $stm->execute([$customerId]);
        }


        $convo=[];
        foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $conversation ){
            $convo[]=new Conversation($conversation['customer_id'],$conversation['date'],$conversation['conversation'],$conversation['id']);

        };
        return $convo;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int|null
     */
    public function getCustomerId(): ?int
    {
        return $this->customer_id;
    }

    /**
     * @param int|null $customer_id
     */
    public function setCustomerId(?int $customer_id): void
    {
        $this->customer_id = $customer_id;
    }

    /**
     * @return string|null
     */
    public function getDate(): ?string
    {
        return $this->date;
    }

    /**
     * @param string|null $date
     */
    public function setDate(?string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string|null
     */
    public function getConversation(): ?string
    {
        return $this->conversation;
    }

    /**
     * @param string|null $conversation
     */
    public function setConversation(?string $conversation): void
    {
        $this->conversation = $conversation;
    }











}