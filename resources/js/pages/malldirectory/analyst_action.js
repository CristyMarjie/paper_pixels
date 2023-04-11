const { default: axios } = require("axios")
const { forEach } = require("lodash")

void new class AnalystAction
{
    constructor()
    {

        this.form = document.querySelector('#update_analyst_form')
        this.deactivateButton = document.querySelector('#deactivate_analyst')
        this.viewAnalystForm = document.querySelector('#view_analyst_form')

        this.updateButton = document.querySelectorAll('.update_analyst')
        this.analystUpdateActionButton = document.querySelector('#analyst_modal_update_submit')

        this.closeUpdateModalButton = document.querySelector('#closeAnalystModal')

        this.eventHandler()
        this.mallAnalystFormValidation()


    }

    eventHandler = () => {
        // document.querySelectorAll('#closeAnalystModal').forEach(element => {
        //     element.addEventListener('click', event =>{
        //         const id = '#'+event.target.id
        //         $(`${id}`).modal('hide')

        //     })
        // })

    $('.update_analyst').on('click',e => {

            this.analystID =  e.currentTarget.dataset.id
            this.fetchAbalystInformation(this.analystID)
    })


    this.analystUpdateActionButton.addEventListener('click', async(e)=>{
        e.preventDefault()

        let status = await this.validation.validate()
        this.updateAnalystID = (e.target).dataset.id
        if(status === 'Valid') this.updateAnalystConfirmation()
    })

    $(document).on('click','#deactivate_analyst',this.deactivateAnalystConfirmation)

    }

    fetchAbalystInformation =  async(id) => {
        const response = await axios.post(`/mall-directory/get/analyst/${id}`)

        const data = response.data

       $('#analyst_name').val(data.analyst_name)

       $('#analyst_email').val(data.analyst_email)
       $('#analyst_contact').val(data.analyst_contact)

       this.analystUpdateActionButton.setAttribute('data-id', data.id)

    }


    updateAnalystConfirmation = async() => {
        confirmAlert('Updating analyst?','Do you wish to continue?', this.updateAnalystAjax)
        this.analystUpdateActionButton.disbled = false
    }

    updateAnalystAjax =  async() => {
        try{
            const response = await axios.post(`/mall-directory/update/analyst/${this.updateAnalystID}`, new FormData(this.form))

            const data = response.data;
            this.form.reset()
            showAlert('Success!', data.message, 'success')

            setTimeout(function(){window.location.href = '/mall-directory'},1000)

        }catch(err){
            console.log(err)
                showAlert('Warning!', 'Something went wrong', 'warning')

        }
    }



    deactivateAnalystConfirmation = (e) => {
        this.deactivateID = (e.target).dataset.id
        confirmAlert('Removing analyst?','Do you wish to continue?',this.deactivateAnlyst)
    }

    deactivateAnlyst = async() => {
        const response = await axios.post(`/mall-directory/deactivate/analyst/${this.deactivateID}`)
        const data = response.data
        showAlert('Success!', data.message, 'success')
        setTimeout(function(){window.location.href = '/mall-directory'},1000)
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
