export function getWeekInYear(date)
{
    const first_day_of_year = new Date( date.getFullYear(),0,1 );

    const number_of_days = Math.floor(( date - first_day_of_year ) / ( 24 * 60 * 60 * 1000 ) );

    return Math.ceil(( date.getDay() + 1 + number_of_days ) / 7 );
}

export function clone(date)
{
    return new Date( date.getTime() );
}
