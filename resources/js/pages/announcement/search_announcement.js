
const { default: axios } = require("axios")
void new class SearchAnnouncement
{
    constructor()
    {
        this.searchField = document.querySelector('#kt_subheader_search_form')
        this.eventHandler()
    }

    eventHandler = () => {
        this.searchField.addEventListener('keyup', () => {
           this.fetchAnnouncement()
        })
    }

    fetchAnnouncement = async() => {
        const result = await axios.get(`/announcement/list/${this.searchField.value}`)
    }


}
