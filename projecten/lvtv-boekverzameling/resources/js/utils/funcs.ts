export type FunctionType<A, B> = (a:A) => B;
export function maybe<A,B>(f:FunctionType<A, B>):FunctionType<A|null, B|null> {
    return (x:A|null) => (x === null) ? null : f(x);
}
