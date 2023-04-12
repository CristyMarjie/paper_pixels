

void new class Product{

    constructor(){
        this.form =  document.querySelector('#productList')
        this.initDatatable()
        this.eventHandler()
    }


    initDatatable() {
        this.datatable = $("#productList").DataTable({
            responsive: true,
            searchDelay: 1000,
            processing: true,
            serverSide: true,
            order: [[0, 'desc']],
            select: {
                style: 'os',
                selector: 'td:first-child',
                className: 'row-selected'
            },
            ajax: {
                url: "/admin/product/list",
            },
            columns: [
                { data: null },
                { data: null },
                { data: null },
                { data: null },
                { data: null },
                { data: null },
            ],
            columnDefs: [
                {
                    targets: 0,
                    render: (data) => data.first_name+' '+data.last_name
                },
                {
                    targets: 1,
                    render:(data) => data.user.email
                },
                {
                    targets: 2,
                    render:(data) =>
                        {
                            let tenant = data.user.tenants
                            let datadis = ''
                            tenant.forEach(element => datadis = datadis + `<li>${element.master_tenant ? element.master_tenant.customer_name : ''}</li>`)
                            return `<ul>${datadis}</ul>`
                        }
                },
                {
                    targets: 3,
                    render:(data) => data.address1
                },
                {
                    targets: 4,
                    render:(data) =>
                    {
                        let tenant_loc = data.user.tenants
                        let dataloc = ''
                        tenant_loc.forEach(element => dataloc = dataloc + `<li>${element.master_tenant ? element.master_tenant.location : ''}</li>`)
                        return `<ul>${dataloc}</ul>`
                    }
                },
                {
                    targets: -1,
                    data: null,
                    orderable: false,
                    render: function (data) {
                        return `
                            <a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 checkContract" data-id="${data.id}">
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                    </svg>
                                </span>
                            </a>
                        `
                    },
                },
            ],

        })

    }

    eventHandler() {
        $(document).on('click','.checkContract', this.passID)

        document.querySelector('.dataTables_filter').addEventListener('input', (e) => {
            let searchData = (e.target.value == null ? '' : e.target.value)
            this.datatable.search(searchData).draw()
        })
    }

    passID = (e) => {
        window.location.href = `/admin/contracts/${e.currentTarget.dataset.id}`
        $('#contract_submit').attr('data-id', e.currentTarget.dataset.id)
    }





}



