<?php
namespace models;

use helper\DB;
use PDO;


class Company
{
    private ?int $id;
    private ?string $name;
    private ?string $address;
    private ?string $vat_code;
    private ?string $company_name;
    private ?string $phone;
    private ?string $email;

    /**
     * @param int|null $id
     * @param string|null $name
     * @param string|null $address
     * @param string|null $vat_code
     * @param string|null $company_name
     * @param string|null $phone
     * @param string|null $email
     */
    public function __construct( ?string $name, ?string $address, ?string $vat_code, ?string $company_name, ?string $phone, ?string $email, ?int $id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->vat_code = $vat_code;
        $this->company_name = $company_name;
        $this->phone = $phone;
        $this->email = $email;
    }

    /**
     * @return Company[]
     */
    public static function all(){
        $pdo=DB::getDB();
        $stm=$pdo->prepare("SELECT * FROM company ORDER BY name");
        $stm->execute([]);
        $allCompanys=[];
        foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $company ){
            $allCompanys[]=new Company($company['name'],$company['address'],$company['vat_code'],$company['company_name'],$company['phone'],$company['email'],$company['id']);

        };
        return $allCompanys;
    }
    public static function takeCompany($id){
        $pdo=DB::getDB();
        $stm=$pdo->prepare("SELECT * FROM company WHERE id=?");
        $stm->execute([$id]);
        $company=$stm->fetch(PDO::FETCH_ASSOC);
        return new Company($company['name'],$company['address'],$company['vat_code'],$company['company_name'],$company['phone'],$company['email'],$company['id']);


    }


    /**
     * @param $id
     * @return array
     */
    public static function takeComp($id=null){
        $pdo=DB::getDB();
        if($id==null){
            $stm=$pdo->prepare("SELECT * FROM company ORDER BY name");
        }else{
            $stm=$pdo->prepare("SELECT * FROM company WHERE id=?");
            $stm->execute([$id]);
        }


        $comp=[];
        foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $company ){
            $comp[]=new Company($company['name'],$company['address'],$company['vat_code'],$company['company_name'],$company['phone'],$company['email'],$company['id']);

        };
        return $comp;
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
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string|null $address
     */
    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string|null
     */
    public function getVatCode(): ?string
    {
        return $this->vat_code;
    }

    /**
     * @param string|null $vat_code
     */
    public function setVatCode(?string $vat_code): void
    {
        $this->vat_code = $vat_code;
    }

    /**
     * @return string|null
     */
    public function getCompanyName(): ?string
    {
        return $this->company_name;
    }

    /**
     * @param string|null $company_name
     */
    public function setCompanyName(?string $company_name): void
    {
        $this->company_name = $company_name;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }


}