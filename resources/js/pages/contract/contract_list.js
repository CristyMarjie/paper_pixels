void new class ContractList
{
    constructor()
    {
        this.contractForm = document.querySelector('#tenant_addContract_form')
        this.submitButton = document.querySelector('#contract_submit')

        this.initDatatable()
        this.eventHandler()
    }

    eventHandler(){


        // document.querySelector('.dataTables_filter').addEventListener('input', (e) => {
        //     let searchData = (e.target.value == null ? '' : e.target.value)
        //     this.datatable.search(searchData).draw()
        // })
    }



    initDatatable() {
        this.datatable = $("#contracts").DataTable({
            responsive: true,
            searching: false,
            processing: true,
            serverSide: true,
            paging:false,
            bInfo: false,
            order: [[0, 'desc']],
            select: {
                style: 'os',
                selector: 'td:first-child',
                className: 'row-selected'
            },
            ajax: {
                url: `/admin/tenant/contracts/${this.submitButton.dataset.id}`,
            },
            columns: [
                { data: null },
                { data: null },
                { data: null },
                { data: null },
                { data: null },
            ],
            columnDefs: [
                {
                    targets: 0,
                    render: (data) =>
                    {
                        let tenant_name = ''
                        data.forEach(e => tenant_name = tenant_name +

                            `<div class="d-flex align-items-center mt-5">
                                        <span class="symbol symbol-50 symbol-light-primary">
                                            <span class="symbol-label font-size-h5 font-weight-bold">${e.tenant.tenant.charAt(0)}</span>
                                        </span>
                                        <div class="d-flex flex-column">
                                            <span class="ml-3 text-dark font-weight-bold">${e.tenant.tenant}</span>
                                            <span class="ml-3">${e.tenant.person_responsible}</span>
                                        </div>
                            </div>`
                        )

                        return `${tenant_name}`

                    }
                },
                {
                    targets: 1,
                    render:(data) =>
                    {
                        let tenant_address = ''
                        data.forEach(e => tenant_address = tenant_address + e.address)
                        return `${tenant_address}`
                    }
                },
                {
                    targets: 2,
                    render:(data) =>
                    {
                        let business_type = ''
                        data.forEach(e => business_type = business_type +
                            `<div class="d-flex align-items-center mt-5">
                                <div class="d-flex flex-column">
                                    <span class="ml-3 text-dark font-weight-bold d-flex flex-column">${e.business_line} <small>( ${e.unit_type}- ${e.business_type})</small></span>
                                </div>
                            </div>`)

                            return `${business_type}`
                    }

                },
                {
                    targets: 3,
                    render:(data) =>
                    {
                        let lease_period = ''
                        data.forEach(e => lease_period = lease_period +
                            `<div class="d-flex align-items-center mt-5">
                                    <div class="d-flex flex-column">
                                        <span class="ml-3 text-dark font-weight-bold">${humanDate(e.lease_term_start)}</span>
                                        <span class="ml-3 text-dark font-weight-bold text-center">to</span>
                                        <span class="ml-3 text-dark font-weight-bold">${humanDate(e.lease_term_end)}</span>
                                    </div>
                            </div>`
                        )

                        return `${lease_period}`
                    }
                },
                {
                    targets: -1,
                    data: null,
                    orderable: false,
                    render: function (data) {
                        let id = ''
                        data.forEach(e => id = id +
                             `
                             <a href="/contract/${e.lease_number}" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">
                             <span class="svg-icon svg-icon-md">
                                 <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                     <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                         <rect x="0" y="0" width="24" height="24"/>
                                         <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                         <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                     </g>
                                 </svg>
                             </span>
                         </a>
                            `
                        )
                        return `${id}`
                    },
                },
            ],

        })

    }

}

