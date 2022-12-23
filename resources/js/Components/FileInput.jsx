import { forwardRef, useEffect, useRef } from 'react';

export default forwardRef(function FileInput(
    {  name, id, className, isFocused, handleChange },
    ref
) {
    const input = ref ? ref : useRef();

    useEffect(() => {
        if (isFocused) {
            input.current.focus();
        }
    }, []);

    return (
        <div className="flex flex-col items-start">
            <input
                type="file"
                name={name}
                id={id}
                className={
                    className
                }
                ref={input}
                onChange={(e) => handleChange(e)}
            />
        </div>
    );
});
