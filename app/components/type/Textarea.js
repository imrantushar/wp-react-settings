import React from 'react';
import {Field} from 'formik';

const Textarea = ({id,title, setFieldValue}) => {
    return (
        <div>
            <label htmlFor={id}>{title}</label>
            <Field component="textarea" id={id} name={id} onChange={(e) => setFieldValue(id, e.target.value)} />
        </div>
    );
}

export default Textarea;
