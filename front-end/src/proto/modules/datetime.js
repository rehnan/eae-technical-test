Date.prototype.toElapsedString = function() {

    let now = new Date()
    let millis = (now - this)

    let seconds = millis / 1000
    let minutes = seconds / 60
    let hours = minutes / 60
    let days = hours / 24
    let months = days / 30
    let years = days / 365

    let dictionary = {
        seconds: ['second', 's'],
        minutes: ['minute', 'min'],
        hours: ['hour', 'h'],
        days: ['day', 'd'],
        months: ['month', 'm'],
        years: ['year', 'y']
    }

    let list = {
        years,
        months,
        days,
        hours,
        minutes,
        seconds
    }

    for (let key in list) {

        let value = Math.floor(list[key])
        if (value >= 1) {

            let name = dictionary[key][value === 1 ? 0 : 1]
            return `${value}${name} ago`
        }
    }

    return 'now'
}
