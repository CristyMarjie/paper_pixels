
void new class AddMall
{
    constructor()
    {

        this.form = document.querySelector('#create_mall_form')

        this.submitButton = document.querySelector('#mall_modal_submit')

        this.mallDirectoryFormValidation()

        this.eventHandler()

    }

    eventHandler = () => {

        this.submitButton.addEventListener('click', async(e) => {
            e.preventDefault()

            let status = await this.validation.validate()

            if(status === 'Valid') this.submitForm()

        })
    }

    submitForm = async () => {
        confirmAlert('Add mall?', 'Do you wish to continue?', this.insertMallAjax)
        this.submitButton.disabled = false
    }

    insertMallAjax = async() => {

        this.formData = new FormData(this.form)

        try{

            const response = await axios.post('/mall-directory/store', this.formData)

            const data = response.data;

            $('#addMallModal').click()

            showAlert('Success!', data.message, 'success')
            setTimeout(function(){window.location.href = '/mall-directory'},1000)


        }catch({response:err}){
                showAlert('Warning!', 'Something went wrong', 'warning')

        }
    }

    mallDirectoryFormValidation() {
        this.validation = FormValidation.formValidation(
            this.form,
            {
                fields:{
                    mall_name:{
                        validators:{
                            notEmpty:{
                                message:"Mall name is required"
                            }
                        }
                    },
                    mall_hours:{
                        validators:{
                            notEmpty:{
                                message:"Office hours is required"
                            }
                        }
                    },
                    mall_address:{
                        validators:{
                            notEmpty:{
                                message:"Mall address is required"
                            }
                        }
                    },
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
                    },
                    pos_contact:{
                        validators:{
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
