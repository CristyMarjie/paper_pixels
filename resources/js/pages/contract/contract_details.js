const { default: axios } = require("axios")

void new class ContractDetails
{
    constructor()
    {
        this.SoaForm = document.querySelector('#tenant_addSoa_form')

        this.submitButton = document.querySelector('#soa_submit')

        this.tenantId = tenantId

        this.user_role = $('meta[name=user_role]').attr('content')

        tenantId = undefined
        this.initDatatable(this.user_role)

        this.contractModalFormValidation()

        this.eventHandler()

        this.datePickers()

    }

    datePickers = () =>{

        $('#statementDate').datepicker(datePickerDefaultSetting).on('changeDate',  e => this.addSoaValidator.revalidateField('statement_date'))

        $('#paymentDue').datepicker(datePickerDefaultSetting).on('changeDate', e =>  this.addSoaValidator.revalidateField('payment_due_date'))

        $('#kt_daterangepicker_1_validate').daterangepicker({
            buttonClasses: ' btn',
            applyClass: 'btn-primary',
            cancelClass: 'btn-secondary',
            autoUpdateInput: false
        });

        $('#rentalPeriodStart').val('')

        $('#statementDateSearch').datepicker(datePickerDefaultSetting).on('changeDate', e =>{
            this.dataTable.search($('#statementDateSearch').val(),'soa_date')
        })

        $('#statementDateSearch').val('')
        $('#kt_datatable_search_query').val('')

        document.querySelector('#soaSearchClear').addEventListener('click',() => {
            this.dataTable.search('','soa_date')
            $('#kt_datatable_search_query').val('')
        })

    }

    eventHandler(){
        this.submitButton.addEventListener('click', async(e) => {
            e.preventDefault()

            let status = await this.addSoaValidator.validate()

            this.currentTenantId  = e.target.dataset.id

            if(status === 'Valid') this.submitForm()

        })

        $(document).on('click', '#remove_soa',this.removeSoaConfirmation)

    }

    removeSoaConfirmation = (e) => {
        this.id = e.currentTarget.dataset.id
        confirmAlert('Removing soa?','Do you wish to continue?', this.updateSoaStatus)
    }

    updateSoaStatus = async() => {
        try{
            const response = await axios.post(`/admin/remove/soa/${this.id}`)
            const data = response.data
            showAlert('Success',data.message,'success')
            $('#statementOfAccounts').KTDatatable('reload')
        }catch({response:err}){
            showAlert('Error', err.message,'error')
        }
    }
    submitForm = async () => {
        confirmAlert('Add Statement of Account?', 'Do you wish to continue?', this.insertSoaAjax)
        this.submitButton.disabled = false
}

    insertSoaAjax = async() => {

        this.formData = new FormData(this.SoaForm)

        this.formData.append('rental_period_start',this.rentalStart)

        this.formData.append('rental_period_end',this.rentalEnd)

        try{
            // const response = await axios.post(`/admin/create/soa/${this.currentTenantId}`, this.formData)

            const response = await axios.post(`/statement/admin/create/${this.currentTenantId}`, this.formData)

            const data = response.data;

            $('#addBirModal_cancel').click()

            showAlert('Success!', data.message, 'success')

            $('#statementOfAccounts').KTDatatable('reload')

        }catch({response:err}){
                showAlert('Warning!', 'Something went wrong', 'warning')

        }
    }

    initDatatable = (admin) => {
        this.dataTable = $('#statementOfAccounts').KTDatatable({
            data:{
                type:'remote',
                source:{
                    read:{
                        url:`/statement/${this.tenantId}`,
                        method:'GET'
                    }
                },
                pageSize: 5,
                serverPaging: true,
                serverFiltering: true,
                serverSorting: true,
            },
            layout: {
                scroll: false,
                footer: false,
            },
            sortable: true,
            pagination: true,
            // detail:{
            //     title:'Attachments',
            //     content : this.attachmentsTable
            // },
            search: {
                input: $('#kt_datatable_search_query'),
                key: 'soaNumber'
            },
            columns:[
                {
                    field:'soa_number',
                    title:'SOA Number',
                },
                {
                    field:'period_start',
                    title:'Period Start',
                    template:(data)=> `<span>${data.period_start}</span>`
                },
                {
                    field: 'Actions',
                    title: 'Actions',
                    sortable: false,
                    width: 100,
                    overflow: 'visible',
                    autoHide: false,
                    template: function(data) {

                            return `
                            <a href="/download/soa/${data.soa_number}" target="_blank" class="btn btn-sm btn-clean btn-icon mr-2" title="Download">
                                <span class="svg-icon svg-icon-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                            <path d="M5.74714567,13.0425758 C4.09410362,11.9740356 3,10.1147886 3,8 C3,4.6862915 5.6862915,2 9,2 C11.7957591,2 14.1449096,3.91215918 14.8109738,6.5 L17.25,6.5 C19.3210678,6.5 21,8.17893219 21,10.25 C21,12.3210678 19.3210678,14 17.25,14 L8.25,14 C7.28817895,14 6.41093178,13.6378962 5.74714567,13.0425758 Z" fill="#000000" opacity="0.3"/>
                                            <path d="M11.1288761,15.7336977 L11.1288761,17.6901712 L9.12120481,17.6901712 C8.84506244,17.6901712 8.62120481,17.9140288 8.62120481,18.1901712 L8.62120481,19.2134699 C8.62120481,19.4896123 8.84506244,19.7134699 9.12120481,19.7134699 L11.1288761,19.7134699 L11.1288761,21.6699434 C11.1288761,21.9460858 11.3527337,22.1699434 11.6288761,22.1699434 C11.7471877,22.1699434 11.8616664,22.1279896 11.951961,22.0515402 L15.4576222,19.0834174 C15.6683723,18.9049825 15.6945689,18.5894857 15.5161341,18.3787356 C15.4982803,18.3576485 15.4787093,18.3380775 15.4576222,18.3202237 L11.951961,15.3521009 C11.7412109,15.173666 11.4257142,15.1998627 11.2472793,15.4106128 C11.1708299,15.5009075 11.1288761,15.6153861 11.1288761,15.7336977 Z" fill="#000000" fill-rule="nonzero" transform="translate(11.959697, 18.661508) rotate(-270.000000) translate(-11.959697, -18.661508) "/>
                                        </g>
                                    </svg>
                                </span>
                            </a>

                            <a href="javascript:;" data-id="${data.id}" data-item"${data.tenant_number}" id="remove_soa"  class="btn btn-sm btn-clean btn-icon mr-2 ${(admin == 1 ? '' : 'd-none')}" title="Remove">
                                <span class="svg-icon svg-icon-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>
                                            <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
                                        </g>
                                    </svg>
                                </span>
                            </a>`
                    },
                }
            ]
        })
    }

    attachmentsTable = (e) => {
        $('<div/>').attr('id',`child_data_ajax_${e.data.id}`).attr('class','child_datatable').appendTo(e.detailCell).KTDatatable({
            data:{
                type:'remote',
                source:{
                    read:{
                        url:`/statement/attachments/${e.data.id}`,
                        method:'GET'
                    }
                },
                pageSize:5,
                serverPaging:false,
                serverFiltering:false,
                serverSorting:false
            },
            layout:{
                scroll:false,
                footer:false,
                spinner:{
                    type:1,
                    theme:'default'
                }
            },
            sortable:true,
            columns:[
                {
                    field:'filename',
                    title:'File name',
                    template:({filename,created_at}) => {
                        return `
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-50 symbol-light mr-4">
                                <span class="symbol-label">
                                    <img src="${generateFileIcon(filename)}" class="h-75 align-self-end" alt="">
                                </span>
                            </div>
                            <div>
                                <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">${filename}</a>
                                <span class="text-muted font-weight-bold d-block">${humanDate(created_at)}</span>
                            </div>
                        </div>
                        `
                    }
                 },
                 {
                    field: 'Actions',
                    title: 'Actions',
                    sortable: false,
                    width: 100,
                    overflow: 'visible',
                    autoHide: false,
                    template: function({id,filename}) {
                        return `
                        <a href="/download?id=${id}&filename=${filename}" class="btn btn-sm btn-clear btn-icon mr=2 download" title="Download">
                            <span class="svg-icon svg-icon-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path d="M5.74714567,13.0425758 C4.09410362,11.9740356 3,10.1147886 3,8 C3,4.6862915 5.6862915,2 9,2 C11.7957591,2 14.1449096,3.91215918 14.8109738,6.5 L17.25,6.5 C19.3210678,6.5 21,8.17893219 21,10.25 C21,12.3210678 19.3210678,14 17.25,14 L8.25,14 C7.28817895,14 6.41093178,13.6378962 5.74714567,13.0425758 Z" fill="#000000" opacity="0.3"/>
                                        <path d="M11.1288761,15.7336977 L11.1288761,17.6901712 L9.12120481,17.6901712 C8.84506244,17.6901712 8.62120481,17.9140288 8.62120481,18.1901712 L8.62120481,19.2134699 C8.62120481,19.4896123 8.84506244,19.7134699 9.12120481,19.7134699 L11.1288761,19.7134699 L11.1288761,21.6699434 C11.1288761,21.9460858 11.3527337,22.1699434 11.6288761,22.1699434 C11.7471877,22.1699434 11.8616664,22.1279896 11.951961,22.0515402 L15.4576222,19.0834174 C15.6683723,18.9049825 15.6945689,18.5894857 15.5161341,18.3787356 C15.4982803,18.3576485 15.4787093,18.3380775 15.4576222,18.3202237 L11.951961,15.3521009 C11.7412109,15.173666 11.4257142,15.1998627 11.2472793,15.4106128 C11.1708299,15.5009075 11.1288761,15.6153861 11.1288761,15.7336977 Z" fill="#000000" fill-rule="nonzero" transform="translate(11.959697, 18.661508) rotate(-270.000000) translate(-11.959697, -18.661508) "/>
                                    </g>
                                </svg>
                            </span>
                        </a>
                    `
                    },
                }
            ]
        })

    }

    contractModalFormValidation = () => {

        this.addSoaValidator = FormValidation.formValidation(
            this.SoaForm,
            {
                fields:{
                    statement_of_account:{
                        validators:{
                            notEmpty:{
                                message:"Statement of account number is required"
                            }
                        }
                    },
                    statement_date:{
                        validators:{
                            notEmpty:{
                                message:"Statement date is required"
                            }
                        }
                    },
                    rental_period:{
                        validators:{
                            notEmpty:{
                                message:"Rental period start is required"
                            }
                        }
                    },
                    payment_due_date:{
                        validators:{
                            notEmpty:{
                                message:"Payment due date is required"
                            }
                        }
                    }
                },
                plugins: {
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
            }
        )
    }




}

