import React from 'react';
import {Field} from 'formik';

const Text = ({id,title, setFieldValue}) => {
    return (
        <div>
            <label htmlFor={id}>{title}</label>
            <Field type="text" id={id} name={id} onChange={(e) => setFieldValue(id, e.target.value)} />
        </div>
    );
}

export default Text;
