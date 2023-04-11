void new class AddAnalyst
{
    constructor()
    {

        this.form = document.querySelector('#create_analyst_form')
        this.submitButton = document.querySelector('#analyst_modal_submit')
        this.openAddModal = document.querySelector('#add_analyst')
        this.eventHandler()
        this.mallAnalystFormValidation()

    }

    eventHandler = () => {
        $(document).on('click','.add_analyst',this.openAddAnalystModal)
        this.submitButton.addEventListener('click', async(e) => {

            e.preventDefault()

            let status = await this.validation.validate()

            if(status === 'Valid')this.submitForm()

        })

    }

    openAddAnalystModal = (e) =>  {
        this.mallId = e.target.getAttribute('data-id')

    }

    submitForm = async () => {
        confirmAlert('Add Analyst?', 'Do you wish to continue?', this.insertAnalystAjax)
        this.submitButton.disabled = false
    }

    insertAnalystAjax = async() => {

        this.formData = new FormData(this.form)

        try{
            const response = await axios.post(`/mall-directory/store/mall-analyst/${this.mallId}`, this.formData)

            const data = response.data;

            $('#addCcAnalystModal').click()
            this.form.reset()
            showAlert('Success!', data.message, 'success')
            setTimeout(function(){window.location.href = '/mall-directory'},1000)

        }catch({response:err}){
                showAlert('Warning!', 'Something went wrong', 'warning')

        }
    }

    mallAnalystFormValidation() {
        this.validation = FormValidation.formValidation(
            this.form,
            {
                fields:{
                    analyst_name:{
                        validators:{
                            notEmpty:{
                                message:"Analyst name is required"
                            }
                        }
                    },
                    analyst_email:{
                        validators:{
                            notEmpty:{
                                message:"Analyst email is required"
                            }
                        }
                    },
                    analyst_contact:{
                        validators:{
                            notEmpty:{
                                message:"Analyst contact is required"
                            },
                            integer:{
                                message:"This is not a valid number"
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
