import React from 'react';
import Text from './type/Text'
import Textarea from './type/Textarea'
import Checkbox from './type/Checkbox'
import Radio from './type/Radio'
import Error from './../components/type/Error'

const Fields = (props) => {
    let renderComponent;
    if(props.type === 'text'){
        renderComponent = <Text {...props} />
    }else if(props.type === 'textarea'){
        renderComponent = <Textarea {...props} />
    }else if(props.type === 'checkbox'){
        renderComponent = <Checkbox {...props} />
    }else if(props.type === 'radio'){
        renderComponent = <Radio {...props} />
    }else {
        renderComponent = <Error {...props} />
    }
    return (
        <div>
            {
                renderComponent
            }
        </div>
    );
}

export default Fields;
