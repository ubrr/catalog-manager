import React from "react";
import styled from "styled-components";

export const DropDown = (props) => {

  

  return (
    
      <DropDownLi>
        <Dropbtn >Записей на странице: {props.pc}</Dropbtn>
        <DropDownContent>
          <SubA onClick={()=>props.setRecord(10)}>10</SubA>
          <SubA onClick={()=>props.setRecord(20)}>20</SubA>
          <SubA onClick={()=>props.setRecord(30)}>30</SubA>
        </DropDownContent>
      </DropDownLi>
    
  );
};


const StyledUl = styled.ul`
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
`;

const StyledLi = styled.li`
  float: left;
`;

const Dropbtn = styled.div`
margin-bottom: 10px;
color: black;

background: white;
margin-top: 25px;
padding: 8px 16px;
text-decoration: none;
transition: background-color 0.3s;
border: 1px solid #ddd;
`;

const DropDownContent = styled.div`
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
  z-index: 1;
`;

const DropDownLi = styled(StyledLi)`
  display: inline-block;
  
  &:hover ${DropDownContent} {
    display: block;
  }
`;

const StyledA = styled.a`
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  &:hover {
    background-color: red;
  }
`;

const SubA = styled.a`
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
  &:hover {
    background-color: #f1f1f1;
  }
`;
