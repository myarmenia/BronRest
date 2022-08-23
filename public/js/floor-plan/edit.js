function busy_free(el, id) {
    axios.patch(`/restaurant/floor_plan/table/busy_free/${id}`)
        .then((res) => {
            let text = (res.data.data ? 'освободит' : 'занимать') + ' столик';
            el.innerHTML = text
        })
        .catch((e) => console.log(e))

}