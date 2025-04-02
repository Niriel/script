export type FunctionType<A, B> = (a:A) => B;
export function maybe<A,B>(f:FunctionType<A, B>):FunctionType<A|null, B|null> {
    return (x:A|null) => {
        if ((x === undefined) || (x === null)) return null;
        const y = f(x);
        return (y === undefined ? null : y);
    }
}

export function getRouteId(route): number|null {
    let id: number;
    if (typeof route.params.id === 'string') {
        id = parseInt(route.params.id);
        return isNaN(id) ? null : id;
    } else if (Array.isArray(route.params.id)) {
        if (route.params.id.length > 0) {
            if (typeof route.params.id[0] === 'string') {
                id = parseInt(route.params.id[0]);
                return isNaN(id) ? null : id;
            }
        }
    }
    return null;
}
