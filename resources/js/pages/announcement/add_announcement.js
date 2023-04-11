const { default: axios } = require("axios")
void new class AddAnnouncement
{
    constructor()
    {

        this.form = document.querySelector('#create_announcement_form')

        this.submitButton = document.querySelector('#announcement_submit')

        this.announcementContainer = document.querySelector('#faq')

        this.specificTickBox  = document.querySelectorAll(".intended_for")

        this.sendOption = document.querySelector('#sendOption')

        this.sendOptSlider = document.querySelector('#sendOption_slider')

        this.announcementModalFormValidation()

        this.eventHandler()

        this.KTCkeditor()

        this.datePicker()

        this.activeTenants()
        this.businessType()

        $('#specific_tenant').hide()
        $('#specific_category').hide()
        $('#sendOption').hide()
        $('#specific').attr('disabled','disabled')

        this.initFileInput()
    }

    initFileInput = () => {
        $("#announcementAttachment").fileinput({
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


    datePicker = () => $('#timestamp').datepicker(datePickerDefaultSetting).on('changeDate',  e => this.validation.revalidateField('timestamp'))

    eventHandler = () => {
        this.submitButton.addEventListener('click', async(e) => {
            e.preventDefault()

            let status = await this.validation.validate()

            if(status === 'Valid') this.submitForm()

        })

        $('#specific').select2()
        $('#category').select2()

        // this.specificTickBox.forEach(e => {
        //     e.addEventListener('change', event => {
        //         if(event.currentTarget.value == 4){
        //             if(event.currentTarget.checked == true){
        //                 $('#specific_tenant').show()
        //                 $('#specific').removeAttr('disabled')

        //                 $('#specific_category').show()
        //                 $('#category').removeAttr('disabled')

        //                 $('#sendOptption').show()

        //             }else{
        //                 $('#specific_tenant').hide()
        //                 $('#specific').attr('disabled','disabled')

        //                 $('#specific_category').hide()
        //                 $('#category').attr('disabled','disabled')
        //             }
        //         }
        //     })
        // })

        this.specificTickBox.forEach(e => {
            e.addEventListener('change', event => {
                if(event.currentTarget.value == 4){
                    if(event.currentTarget.checked == true){
                        $('#sendOption').show()

                        $('#specific_tenant').show()
                        $('#specific').removeAttr('disabled')
                    }else{
                        $('#sendOption').hide()

                    }
                }
            })
        })

        this.sendOptSlider.addEventListener('change', (e) => {
            if(e.target.checked)
            {
                $('#specific_tenant').hide()
                $('#specific').attr('disabled','disabled')

                $('#specific_category').show()
                $('#category').removeAttr('disabled')

            }else{
                $('#specific_tenant').show()
                $('#specific').removeAttr('disabled')

                $('#specific_category').hide()
                $('#category').attr('disabled','disabled')
            }
        })

    }

    activeTenants = async () => {
        const response = await axios.get('/announcement/tenant/list')
        const data = response.data
        data.forEach(element => {
            $('#specific').append(`
                <option value="${element.id}">${element.master_tenant.tenant}</option>
            `)
        })

    }

    businessType = async() => {
        const response = await axios.get('/contract/business/type')
        const data = response.data
        for(const e of data){
            $('#category').append(`
                <option value="${e.business_type}">${e.business_type}</option>
            `)
        }
    }

    submitForm = async () => {

        confirmAlert('Add Announcement?', 'Do you wish to continue?', this.insertAnnouncementAjax)
        this.submitButton.disabled = false
    }

    insertAnnouncementAjax = async() => {
        this.formData = new FormData(this.form)
        this.formData.append('description',this.editorData.getData())
        try{

            const response = await axios.post('/announcement/store/', this.formData)

            const data = response.data;

            $('#addAnnounceModal').click()

            showAlert('Success!', data.message, 'success')

            // $('#statementOfAccounts').KTDatatable('reload')

        }catch({response:err}){
                showAlert('Warning!', 'Something went wrong', 'warning')

        }
    }

    announcementModalFormValidation = () => {

        this.validation = FormValidation.formValidation(
            this.form,
            {
                fields:{
                    title:{
                        validators:{
                            notEmpty:{
                                message:"Title is required"
                            }
                        }
                    },
                    timestamp:{
                        validators:{
                            notEmpty:{
                                message:"Statement date is required"
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

    KTCkeditor = () => {
        ClassicEditor
        .create( document.querySelector('#kt-ckeditor-1'))
        .then( editor => {
            this.editorData = editor
        } )
        .catch( error => {
            console.error( error )
        } )
    }



}
