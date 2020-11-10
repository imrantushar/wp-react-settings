import React, { useState, useEffect } from 'react'
import { Tab, Tabs, TabList, TabPanel } from 'react-tabs'
import { Formik, Form } from 'formik'
import fetchWP from './../utils/fetchWP'
import Group from './../components/type/Group'
import Fields from './../components/Fields'

const Settings = ({ wpObject }) => {
    const [tabIndex, setTabIndex] = useState(0)
    const [formValue, setFormValue] = useState({})
    useEffect(() => {
        getSetting()
    }, [])
    const FETCHWP = new fetchWP({
        restURL: wpObject.api_url,
        restNonce: wpObject.api_nonce,
    })
    const processOkResponse = (json, action) => {
        if (json.success) {
            setFormValue(JSON.parse(json.value))
        } else {
            console.log(`Setting was not ${action}.`, json)
        }
    }

    const getSetting = () => {
        FETCHWP.get('wprs').then(
            (json) => setFormValue(JSON.parse(json.value)),
            (err) => console.log('error', err)
        )
    }
    return (
        <Formik
            enableReinitialize={true}
            initialValues={formValue}
            onSubmit={(values, actions) => {
                FETCHWP.post('wprs', {
                    wprsSetting: JSON.stringify(values, null, 2),
                }).then(
                    (json) => processOkResponse(json, 'saved'),
                    (err) => console.log('error', err)
                )
            }}
        >
            {(props) => {
                return (
                    <form onSubmit={props.handleSubmit}>
                        <Tabs
                            selectedIndex={tabIndex}
                            onSelect={(tabIndex) => setTabIndex(tabIndex)}
                        >
                            <TabList>
                                {wpObject.settings.map((item, index) => (
                                    <Tab key={index}>{item.title}</Tab>
                                ))}
                            </TabList>
                            {wpObject.settings.map((item, index) => (
                                <TabPanel key={index}>
                                    {Object.keys(props.values).length > 0 && (
                                        <React.Fragment>
                                            {item.group !== undefined &&
                                                Object.keys(item.group).length >
                                                    0 && (
                                                    <Group
                                                        {...item}
                                                        values={props.values}
                                                    />
                                                )}
                                            {
                                                // main tabs fields
                                                item.fields !== undefined &&
                                                    item.fields.length > 0 &&
                                                    item.fields.map(
                                                        (
                                                            fieldItem,
                                                            fieldIndex
                                                        ) => (
                                                            <Fields
                                                                {...fieldItem}
                                                                setFieldValue={
                                                                    props.setFieldValue
                                                                } // formik
                                                                key={fieldIndex}
                                                                values={
                                                                    props.values
                                                                }
                                                            />
                                                        )
                                                    )
                                            }
                                        </React.Fragment>
                                    )}
                                </TabPanel>
                            ))}
                        </Tabs>
                        <button type='submit' disabled={props.isSubmitting}>
                            Submit
                        </button>
                    </form>
                )
            }}
        </Formik>
    )
}

export default Settings
