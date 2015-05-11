<?php
class Custom_Restapi_Model_Api2_Restapi_Rest_Guest_V1 extends Custom_Restapi_Model_Api2_Restapi
{

    /**
     * Create a customer
     * @return array
     */

    public function _create(array $data) {

        $firstName = $data['firstname'];
        $lastName = $data['lastname'];
        $email = $data['email'];
        $password = $data['password'];

        $customer = Mage::getModel("customer/customer");

        $customer->setFirstname($firstName);
        $customer->setLastname($lastName);
        $customer->setEmail($email);
        $customer->setPasswordHash(md5($password));
        $customer->save();

        return $this->_getLocation($customer);
    }

}