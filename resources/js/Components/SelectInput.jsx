import { forwardRef, useEffect, useRef } from 'react';

export default forwardRef(function SelectInput(
    { options, value, name, id,  className, autoComplete, required, isFocused, handleChange },
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
            <select
                name={name}
                id={id}
                className={
                    `border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm ` +
                    className
                }
                value={value}
                ref={input}
                autoComplete={autoComplete}
                required={required}
                onChange={(e) => handleChange(e)}
            >
                {options.map(({key, label}) => {
                    return (
                        <option key={key} value={key}>{label}</option>
                    )
                }) }
            </select>
        </div>
    );
});
