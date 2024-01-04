<?php

namespace App\Controllers;


use App\Models\StockModel;
use App\Models\TablesModel;


class Managestock extends BaseController
{
    // load the dables condaining all the products 
    public function index()
    {
        $products = new StockModel();
        $data['products'] = $products->findAll();
       return view("dashboard/managestock", $data);
    }




    // upload a product information 
    public function create()
    {
        $validationRules = [
            'productName' => 'required|is_unique[stock.productName]',
            'category' => 'required',
            'purchasePrice' => 'numeric',
            'tagPrice' => 'numeric',
            'salePrice' => 'numeric',
            'salePrice2' => 'numeric',
            'description' => 'required'
        ];

        $validationMessages = [
            'productName' => [
                'required' => 'Product Name is required.'
            ],
            'category' => [
                'required' => 'Product Category is required.'
            ],
            'purchasePrice' => [
                'numeric' => 'Purchase Price must be a valid number.'
            ],
            'tagPrice' => [
                'numeric' => 'Tag Price must be a valid number.'
            ],
            'salePrice' => [
                'numeric' => 'Sale Price (Store last price) must be a valid number.'
            ],
            'salePrice2' => [
                'numeric' => 'Sale Price (Referral last price) must be a valid number.'
            ],
            'description' => [
                'required' => 'Product Specification/Description is required.'
            ]
        ];

        if ($this->request->getMethod() === 'post') {

            $validator = \Config\Services::validation();
            $validator->setRules($validationRules, $validationMessages);

            if ($validator->withRequest($this->request)->run()) {
                // Validation passed, save the product
                $productModel = new StockModel();

                $data = [
                    'productName' => $this->request->getPost('productName'),
                    'category' => $this->request->getPost('category'),
                    'purchasePrice' => $this->request->getPost('purchasePrice'),
                    'tagPrice' => $this->request->getPost('tagPrice'),
                    'salePrice' => $this->request->getPost('salePrice'),
                    'salePrice2' => $this->request->getPost('salePrice2'),
                    'description' => $this->request->getPost('description')
                ];

                $productModel->insert($data);

                // Redirect or show success message
                return redirect()->to('/managestock')->with('success', 'One more thing! You have to add the product Image. Find theproduct in the last below and click edit add product Image');
            } else {
                // Validation failed, show errors
                return redirect()->back()->withInput()->with('errors', $validator->getErrors());
            }
        }

        // If the request method is not POST, show the form
        return view("dashboard/forms/product-form.php");
    }


    public function addpic($id){

        $productModel = new StockModel();
        $data['product'] = $productModel->find($id);

        // Load the helper and libraries
        helper(['form', 'url']);
        
        // Check if the request method is POST
        if ($this->request->getMethod() === 'post') {
            
            // Set the validation rules
            $rules = [
                'featureImg' => 'uploaded[featureImg]|max_size[featureImg,6024]|is_image[featureImg]|mime_in[featureImg,image/jpeg,image/jpg,image/png]'
            ];
            
            if ($this->validate($rules)) {

                // Get the uploaded file
                $image = $this->request->getFile('featureImg');
                // Generate a random name for the file
                $newName = $image->getRandomName();
                
                $data['product']['featureImg'] = $newName;
                // Move the uploaded file to the desired location

                if($image->move(ROOTPATH . 'public/uploads', $newName)){
                    if($productModel->update($id, $data['product'])){
                        return redirect()->to('/managestock')->with('success', 'Image add for product successfully');
                    }else{
                        return redirect()->to('/managestock')->with('error', 'Image uploaded but did not save in the database');
                    }
                }else{
                    return redirect()->to('/managestock')->with('error', 'Image did not upload. An unknown error occured');
                };
            
            }else{
                // if validation error occures redirect 
                $data['validation'] = $this->validator;
                return view("dashboard/forms/product_image_form.php", $data);
            }
            
        } 
        // if the product you're trying to update pic is not found, redirect and exit
        if(!$data['product']){
            return redirect()->to('/managestock')->with('error', 'The product you trying to add picture to does not exist! it might have been deleted');
        }

        return view("dashboard/forms/product_image_form.php", $data);
    }


    // this method will hode or show the product in the store on the site 
    public function show_or_hide($id){

        $StockModel = new StockModel();
        $StockData = $StockModel->find($id);
        if(!$StockData){
            return redirect()->to('managestock')->with('error', 'Product not found in store. It might have been deleted');
            exit();
        }
        //change the status 
        if($StockData['hide'] == 1){
            $StockData['hide'] = 0;
        }else{
            $StockData['hide'] = 1;
        }

        if($StockModel->update($id, $StockData)){
            return redirect()->to('managestock')->with('success', 'You successfully change the visibility of a product in your website. This does not affect the database !');  
        }else{
            return redirect()->to('managestock')->with('error', 'The view status of your product did not change. Error occured');
        }

    }

}
