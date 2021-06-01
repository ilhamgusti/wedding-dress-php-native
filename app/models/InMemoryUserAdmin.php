<?php
class InMemoryUserAdmin
{
    private $data = [
        'id'=> '9999999',
        'name'=>'Admin',
        'password'=> ADMIN_PASS,
        'phoneNumber'=> ADMIN_PHONE,
        'isAdmin'=>true
    ];

    public function check($data)
    {
        if($data['phoneNumber'] == $this->data['phoneNumber'] && $data['password'] == $this->data['password']){
            return $this->data;
        }else{
            return false;
        }
    }

}
