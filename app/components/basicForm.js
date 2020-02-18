import React, { useState, useEffect } from 'react';
import { Formik, Form } from 'formik'
import fetchWP from './../utils/fetchWP'

const BasicForm = (props) => {
    const [formValue, setFormValue] = useState({
        firstName: "",
        lastName: "",
        email: ""
      });

     // Similar to componentDidMount and componentDidUpdate:
    useEffect(() => {
        getSetting();
    }, []);

    const FETCHWP = new fetchWP({
        restURL: props.wpObject.api_url,
        restNonce: props.wpObject.api_nonce,
    });
    const processOkResponse = (json, action) => {
        if (json.success) {
            setFormValue(JSON.parse(json.value))
        } else {
          console.log(`Setting was not ${action}.`, json);
        }
      }

    const getSetting = () => {
        FETCHWP.get( 'wprs' )
        .then(
          (json) => setFormValue(JSON.parse(json.value)),
          (err) => console.log( 'error', err )
        );
      };

  
  return (
    <Formik
        enableReinitialize={true}
        initialValues={formValue}
        onSubmit={(values, actions) => {
            FETCHWP.post( 'wprs', { wprsSetting: JSON.stringify(values, null, 2) } )
            .then(
                (json) => processOkResponse(json, 'saved'),
                (err) => console.log('error', err)
            );
      }}
    >
        {props => {
            console.log(props)
            return (
            <form onSubmit={props.handleSubmit}>
            <label htmlFor="firstName">First Name</label>
            <input
                id="firstName"
                name="firstName"
                type="text"
                onChange={props.handleChange}
                value={props.values.firstName}
            />
            <br />
            <label htmlFor="lastName">Last Name</label>
            <input
                id="lastName"
                name="lastName"
                type="text"
                onChange={props.handleChange}
                value={props.values.lastName}
            />
            <br />
            <label htmlFor="email">Email Address</label>
            <input
                id="email"
                name="email"
                type="email"
                onChange={props.handleChange}
                value={props.values.email}
            />
            <br />
            <button type="submit">
                {
                   (props.isSubmitting === true ? 'Submitting...' : 'submit')
                }
            </button>
            </form>
        )}}
    </Formik>
  );
};

export default BasicForm