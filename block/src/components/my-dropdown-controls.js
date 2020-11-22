const { createSlotFill } = wp.components;

const { Fill, Slot } = createSlotFill( 'MyDropdownControls' );

const MyDropdownControls = Fill;
MyDropdownControls.Slot = Slot;

export default MyDropdownControls;
