const { default: axios } = require("axios")

void new class AddMoreContract{
    constructor() {
        this.form = document.querySelector('#tenant_addMoreContract_form')
        this.buttonSubmit = document.querySelector('#contract_submit')
        this.invalidTenant = document.querySelector('.invalid-tenant')
        this.tenantList()
        this.eventHandler()
    }

    eventHandler = () => {

        $('#tenant_select2').select2()
        $(document).on('change','#tenant_select2', this.validateExistence)
        $(document).on('click', '#contract_submit', this.submitForm)
    }

    submitForm = async(e) => {
        e.preventDefault()
        confirmAlert('Add tenant?','Do you wish to continue?', this.insertAjax)
    }

    insertAjax = async() => {
        try{
            const response = await axios.post('/contract/add/more/tenant',{id:this.buttonSubmit.getAttribute('data-id'),
                                                                                   tenant_id: this.tenant_id})


            const data = response.data

            $('#addMoreTenantStore').modal('hide')
            $('#contracts').DataTable().draw()
            showAlert('Success!', data.message, 'success')

        }catch{

        }
    }

    tenantList = async() => {
        const result = await axios.get('/tenant/list')
        const data = result.data
        for(const e of data){$('#tenant_select2').append(`<option value="${e.tenant_number}" data-item="${e.location}">${e.tenant}</option>`)}

        $('#location').val($('#tenant_select2').find('option:selected').attr('data-item'))
    }

    validateExistence = async(e) => {

        $('#location').val($('#tenant_select2').find('option:selected').attr('data-item'))
        this.tenant_id = e.target.value
        const result = await axios.get(`/contract/validate/existing/${this.tenant_id}`,{params:{id: this.buttonSubmit.getAttribute('data-id')} })
        if(!result.data.success){
            this.invalidTenant.classList.remove('d-none')
            this.buttonSubmit.disabled = true
        }else{
            this.invalidTenant.classList.add('d-none')
            this.buttonSubmit.disabled = false
        }

    }




}
