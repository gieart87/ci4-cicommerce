<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\AttributeModel;
use App\Models\AttributeOptionModel;

class AttributeOptions extends BaseController
{
    protected $attributeModel;
    protected $attributeOptionModel;
    protected $perPage = 10;

    public function __construct()
    {
        $this->attributeModel = new AttributeModel();
        $this->attributeOptionModel = new AttributeOptionModel();

        $this->data['currentAdminMenu'] = 'catalogue';
        $this->data['currentAdminSubMenu'] = 'attribute_option';
    }

    public function index($attributeId = null, $attributeOptionId = null)
    {
        if (!$attributeId) {
            $this->session->setFlashdata('errors', 'Invalid attribute');
            return redirect()->to('/admin/attributes');
        }

        if ($attributeId) {
            $attribute = $this->attributeModel->find($attributeId);

            if (!$attribute) {
                $this->session->setFlashdata('errors', 'Invalid attribute');
                return redirect()->to('/admin/attributes');
            }

            $this->data['attribute'] = $attribute;
        }

        if ($attributeOptionId) {
            $attributeOption = $this->attributeOptionModel->find($attributeOptionId);

            if (!$attributeOption) {
                $this->session->setFlashdata('errors', 'Invalid attribute option');
                return redirect()->to('/admin/attributes');
            }

            $this->data['attributeOption'] = $attributeOption;
        }

        $this->getAttributeOptions($attributeId);

        return view('admin/attribute_options/index', $this->data);
    }

    private function getAttributeOptions($attributeId)
    {
        $this->data['attributeOptions'] = $this->attributeOptionModel->where('attribute_id', $attributeId)->paginate($this->perPage, 'bootstrap');
        $this->data['pager'] = $this->attributeOptionModel->pager;
    }

    public function store()
    {
        $attributeId = $this->request->getVar('attribute_id');

        $params = [
            'name' => $this->request->getVar('name'),
            'attribute_id' => $attributeId,
        ];

        if ($this->attributeOptionModel->save($params)) {
            $this->session->setFlashdata('success', 'Attribute option has been saved');
            return redirect()->to('/admin/attribute-options/'. $attributeId);
        } else {
            $this->getAttributeOptions($attributeId);
            $this->data['attribute'] = $this->attributeModel->find($attributeId);
            $this->data['errors'] = $this->attributeOptionModel->errors();
            return view('admin/attribute_options/index', $this->data);
        }
    }

    public function update($id, $attributeId)
    {
        $attributeId = $this->request->getVar('attribute_id');

        $params = [
            'id' => $id,
            'name' => $this->request->getVar('name'),
        ];

        if ($this->attributeOptionModel->save($params)) {
            $this->session->setFlashdata('success', 'Attribute option has been updated');
            return redirect()->to('/admin/attribute-options/'. $attributeId);
        } else {
            $this->getAttributeOptions($attributeId);
            $this->data['attributeOption'] = $this->attributeOptionModel->find($id);
            $this->data['attribute'] = $this->attributeModel->find($attributeId);
            $this->data['errors'] = $this->attributeOptionModel->errors();
            return view('admin/attribute_options/index', $this->data);
        }
    }

    public function destroy($id)
    {
        $attributeOption = $this->attributeOptionModel->find($id);

        if (!$attributeOption) {
            $this->session->setFlashdata('errors', 'Invalid attribute option');
            return redirect()->to('/admin/attributes');
        }

        $attributeId = $attributeOption->attribute_id;

        if ($this->attributeOptionModel->delete($attributeOption->id)) {
            $this->session->setFlashdata('success', 'Attribute option has been deleted');
            return redirect()->to('/admin/attribute-options/'. $attributeId);
        } else {
            $this->session->setFlashdata('errors', 'Could not delete attribute option');
            return redirect()->to('/admin/attribute-options/'. $attributeId);
        }
    }
}
