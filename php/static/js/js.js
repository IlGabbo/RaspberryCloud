function changeFocus(id) {
    let inp = document.getElementById(id)
    let b = Number(id) + Number(1)
    console.log(b)
    if (inp && inp.value) {
        if (b <= 6) {
            document.getElementById(b).focus()
        } else if (b > 6) {
            document.getElementById("1").focus()
        }
    }
}



