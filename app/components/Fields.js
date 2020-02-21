import React from 'react';
import Text from './type/Text'
import Textarea from './type/Textarea'
import Error from './../components/type/Error'

const Fields = (props) => {
    let renderComponent;
    if(props.type === 'text'){
        renderComponent = <Text {...props} />
    }else if(props.type === 'textarea'){
        renderComponent = <Textarea {...props} />
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
