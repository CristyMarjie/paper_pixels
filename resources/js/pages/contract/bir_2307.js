void new class ContractDetails
{
    constructor()
    {
        this.uploadForm = document.querySelector('#tenant_addBir_form')
        this.rejectReasonForm = document.querySelector('#reject_reason_form')

        this.rejectFrmSubmitBtn = document.querySelector('#reject_bir_button')
        this.submitButton = document.querySelector('#bir_submit')
        this.lease_id = $('#bir_submit').data('id')

        this.user_role = $('meta[name=user_role]').attr('content')

        // this.tenantId = tenantId

        // tenantId = undefined

        this.initDatatable(this.user_role)


        this.eventHandler()

        this.BirModalFormValidation()
        this.RejectReasonValidation()

        this.datePickers()

        this.initFileInput()

    }

    initFileInput = () => {
        $("#birAttachments").fileinput({
            theme: "explorer",
            uploadUrl: "#",
            deleteUrl: '#',
            enableResumableUpload: true,
            // maxFileCount: 5,
            allowedFileExtensions: ['jpg', 'png', 'jpeg','pdf', 'docs', 'docx', 'txt','xls','xlsx','csv'],
            theme: 'fas',
            showUpload:false,
            removeFromPreviewOnError: true,
            overwriteInitial: false,
        }).on('change',() => {
            $('#attachment_error').html('')
        })
    }

    datePickers = () =>{

        $('#start_date').datepicker(datePickerDefaultSetting).on('changeDate',  e => this.addBirValidator.revalidateField('start_date'))

        $('#end_date').datepicker(datePickerDefaultSetting).on('changeDate', e =>  this.addBirValidator.revalidateField('end_date'))

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
            let status = await this.addBirValidator.validate()

            this.currentContractID  = e.target.dataset.id

            if(status === 'Valid') this.submitForm()

        })

        $(document).on('click','#reject_modal',this.openRejectModal)
        $(document).on('click', '#accept_bir', this.submitAcceptBIR)
        this.rejectFrmSubmitBtn.addEventListener('click', async(e) =>{
            e.preventDefault()
            let status = await this.RejectReasonValidator.validate()
            if(status === 'Valid') this.rejectBir()
        })

       $(document).on('mouseover', '.stats_btn', this.mouseover)

    }

    mouseover (e) {
        this.setAttribute
    }

    openRejectModal(e){
        globalThis.id = e.currentTarget.dataset.id
        $('#reject_bir_modal').modal('show')
        return this.id
    }
    submitAcceptBIR = async(e) => {
        globalThis.accept_id = e.currentTarget.dataset.id
        confirmAlert('Accepting BIR 2307?','Do you wish to continue?', this.acceptActionAjax)
    }

    acceptActionAjax = async() => {
        try{
            const response = await axios.post(`/contract/accept/bir/2307/${globalThis.accept_id}`)
            const data = response.data
            showAlert('Success!', data.message, 'success')
            $('#bir2307').KTDatatable('reload')
        }catch({response:err}){
            showAlert('Warning!','Something went wrong', 'warning')
        }


    }

    submitForm = async () => {
        confirmAlert('Attach BIR 2307?', 'Do you wish to continue?', this.insertBirAjax)
        this.submitButton.disabled = false
    }

    rejectBir = async() => {
        this.formData = new FormData(this.rejectReasonForm)
        try{
            const response = await axios.post(`/contract/reject/bir/2307/${globalThis.id}`, this.formData)
            const {data:data} = response.data
            $('#closeBirRejectModal').click()
            this.rejectReasonForm.reset()
            showAlert('Success!', data.message,'success')
            $('#bir2307').KTDatatable('reload')
        }catch({response:err}){
            showAlert('Warning!', 'Something went wrong', 'warning')
        }
    }

    insertBirAjax = async() => {

        this.formData = new FormData(this.uploadForm)
        try{
            const response = await axios.post(`/contract/bir/2307/create/${this.currentContractID}`, this.formData)

            const {data:data} = response.data
            const lease_number = data.lease_number

            $('#addBirModal_cancel').click()
            document.querySelector('#tenant_addBir_form').reset()
            showAlert('Success!', data.message, 'success')
            $('#bir2307').KTDatatable('reload')


        }catch({response:err}){
                showAlert('Warning!', 'Something went wrong', 'warning')

        }
    }

    initDatatable = (admin) => {

        this.dataTable = $('#bir2307').KTDatatable({
            data:{
                type:'remote',
                source:{
                    read:{
                        url:`/contract/bir/2307/list/${this.lease_id}`,
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

            columns:[
                {
                    field:'id',
                    title:'ID',
                    sortable: false,
					width: 25,
					textAlign: 'center',
                },
                {
                    field:'created_at',
                    title:'Created Date',
                    template:(data)=> `<span>${humanDate(data.created_at)}</span>`
                },
                {
                    field:'status',
                    title:'Status',
                    template:(data) =>{
                        return `<button type="button" class="btn btn-${(data.status == 0 ? 'warning' : data.status == 1 ? 'success' : 'danger')} stats_btn" data-toggle="tooltip" data-placement="top"
                        title="${(data.status_message == null ? '' : data.status_message)}"><img src="${data.path}" alt>
                            ${(data.status == 0 ? 'Submitted' : data.status == 1 ? 'Accepted' : 'Rejected')}
                        </button>`
                    }
                },
                {
                    field: 'Actions',
                    title: 'Actions',
                    sortable: false,
                    width: 100,
                    overflow: 'visible',
                    autoHide: false,
                    template: (data) => {
                        return `
                        <a href="/contract/download/bir/${data.id}" target="_blank" class="btn btn-sm btn-clean btn-icon mr-2">
                        <span class="svg-icon svg-icon-lg"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"/>
                            <path d="M5.74714567,13.0425758 C4.09410362,11.9740356 3,10.1147886 3,8 C3,4.6862915 5.6862915,2 9,2 C11.7957591,2 14.1449096,3.91215918 14.8109738,6.5 L17.25,6.5 C19.3210678,6.5 21,8.17893219 21,10.25 C21,12.3210678 19.3210678,14 17.25,14 L8.25,14 C7.28817895,14 6.41093178,13.6378962 5.74714567,13.0425758 Z" fill="#000000" opacity="0.3"/>
                            <path d="M11.1288761,15.7336977 L11.1288761,17.6901712 L9.12120481,17.6901712 C8.84506244,17.6901712 8.62120481,17.9140288 8.62120481,18.1901712 L8.62120481,19.2134699 C8.62120481,19.4896123 8.84506244,19.7134699 9.12120481,19.7134699 L11.1288761,19.7134699 L11.1288761,21.6699434 C11.1288761,21.9460858 11.3527337,22.1699434 11.6288761,22.1699434 C11.7471877,22.1699434 11.8616664,22.1279896 11.951961,22.0515402 L15.4576222,19.0834174 C15.6683723,18.9049825 15.6945689,18.5894857 15.5161341,18.3787356 C15.4982803,18.3576485 15.4787093,18.3380775 15.4576222,18.3202237 L11.951961,15.3521009 C11.7412109,15.173666 11.4257142,15.1998627 11.2472793,15.4106128 C11.1708299,15.5009075 11.1288761,15.6153861 11.1288761,15.7336977 Z" fill="#000000" fill-rule="nonzero" transform="translate(11.959697, 18.661508) rotate(-270.000000) translate(-11.959697, -18.661508) "/>
                        </g>
                    </svg>
                        </span>
                    </a>

                    <a href="javascript:;" id="accept_bir" data-id="${data.id}" class="btn btn-sm btn-clean btn-icon mr-2 ${(admin == 1 && data.status == 0 ? '' : 'd-none')}" title="View">
                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo9/dist/../src/media/svg/icons/Navigation/Check.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"/>
                                <path d="M6.26193932,17.6476484 C5.90425297,18.0684559 5.27315905,18.1196257 4.85235158,17.7619393 C4.43154411,17.404253 4.38037434,16.773159 4.73806068,16.3523516 L13.2380607,6.35235158 C13.6013618,5.92493855 14.2451015,5.87991302 14.6643638,6.25259068 L19.1643638,10.2525907 C19.5771466,10.6195087 19.6143273,11.2515811 19.2474093,11.6643638 C18.8804913,12.0771466 18.2484189,12.1143273 17.8356362,11.7474093 L14.0997854,8.42665306 L6.26193932,17.6476484 Z" fill="#000000" fill-rule="nonzero" transform="translate(11.999995, 12.000002) rotate(-180.000000) translate(-11.999995, -12.000002) "/>
                            </g>
                        </svg><!--end::Svg Icon--></span>
                    </a>

                    <a href="javascript:;" data-id="${data.id}" id="reject_modal" class="btn btn-sm btn-clean btn-icon mr-2 ${(admin == 1 && data.status == 0 ? '' : 'd-none')}" title="View">
                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo9/dist/../src/media/svg/icons/Navigation/Close.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                    <rect x="0" y="7" width="16" height="2" rx="1"/>
                                    <rect opacity="0.3" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000) " x="0" y="7" width="16" height="2" rx="1"/>
                                </g>
                            </g>
                        </svg><!--end::Svg Icon--></span>
                    </a> `
                    },
                }
            ]
        })

    }

    BirModalFormValidation = () => {

        this.addBirValidator = FormValidation.formValidation(
            this.uploadForm,
            {
                fields:{
                    birAttachments:{
                        validators:{
                            notEmpty:{
                                message:"Attachment is required"
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

    RejectReasonValidation = () => {
        this.RejectReasonValidator = FormValidation.formValidation(
            this.rejectReasonForm,
            {
                fields:{
                    status_message:{
                        validators:{
                            notEmpty:{
                                message:"Reject message should not be empty"
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

