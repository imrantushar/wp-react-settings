import React from 'react';
import Text from './type/Text'
import Error from './../components/type/Error'

const Fields = (props) => {
    let renderComponent;
    if(props.type === 'text'){
        renderComponent = <Text {...props} />
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