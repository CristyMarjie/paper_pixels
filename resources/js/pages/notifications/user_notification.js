const { default: axios } = require("axios")
const { colors } = require("laravel-mix/src/Log")
const { reject } = require("lodash")

void new class UserNotification
{
    constructor(){
        this.getNotices()
        this.getRejectedBir()
    }
    getRejectedBir = async()=>{
        try{
            const {data:rejected} = await axios.get('/contract/bir/rejected/notification')

            rejected.forEach(({filename, created_at}) => {
                $('#rejected-list').append(`
                <div class="d-flex align-items-center mb-6">
                      <div class="symbol symbol-40 symbol-light-success mr-5">
                         <span class="symbol-label">
                            <span class="svg-icon svg-icon-lg svg-icon-success">
                               <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                     <rect x="0" y="0" width="24" height="24" />
                                     <path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000" />
                                     <path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3" />
                                  </g>
                               </svg>
                            </span>
                         </span>
                      </div>
                      <div class="d-flex flex-column font-weight-bold">
                         <a href="javascript:;" class="text-hover-primary mb-1 font-size-lg">${filename} was rejected</a>
                         <span class="text-muted">${humanDate(created_at)} </span>
                      </div>
                   </div>
                `)
            })

        }catch(err){

        }
    }

    getNotices = async()=>{
        try{
            const {data:notices} = await axios.get('/notices')

            notices.forEach(({id,created_at,notice_type}) => {
                let type = ''
                switch(notice_type){
                    case 'FIRST_NOTICE':
                        type = 'First Notice of Default Payment (30 Days)'
                        break;
                    case 'SECOND_NOTICE':
                        type = 'Second Notice of Default In Payment (60 Days)'
                        break;
                    case 'THIRD_NOTICE':
                        type = 'Pre-Termination of Lease'
                        break;
                    case 'TURNOVER_NOTICE':
                        type = 'Takeover Notice'
                        break;
                    default:
                        console.log('invalid notice type')
                        break;
                }

                $('#notices-list').append(`
                <div class="d-flex align-items-center mb-6">
                      <div class="symbol symbol-40 symbol-light-success mr-5">
                         <span class="symbol-label">
                            <span class="svg-icon svg-icon-lg svg-icon-success">
                               <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                     <rect x="0" y="0" width="24" height="24" />
                                     <path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000" />
                                     <path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3" />
                                  </g>
                               </svg>
                            </span>
                         </span>
                      </div>
                      <div class="d-flex flex-column font-weight-bold">
                         <a href="/notice/details/${id}" class="text-hover-primary mb-1 font-size-lg">${type}</a>
                         <span class="text-muted">${humanDate(created_at)} </span>
                      </div>
                   </div>
                `)
            })

            this.getTodaysNotifCount(notices)

        }catch(err){

        }
    }



    getTodaysNotifCount = (notice) =>{
        let count = 0
        const dateToday = new Date().toLocaleDateString('en-ca')
        notice.forEach(elem => {if(elem.created_at == dateToday) count++})

        $('#countNotice').text(count)
    }
}
