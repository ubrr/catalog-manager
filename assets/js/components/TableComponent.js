import React, { useState } from "react";
import { Box } from "rebass";

import styled from "styled-components";
import { DropDown } from "./DropDown";

export const TableComponent = ({ columns, data }) => {
  const [pageNumber, setPageNumber] = useState(1);
  const [recordOnPage, setRecordOnPage] = useState(15);
  let rows = [];
  for (
    let index = recordOnPage * (pageNumber - 1);
    index < recordOnPage * pageNumber;
    index++
  ) {
    if (index === data.length) {
      break;
    }
    rows.push(
      <Row key={index}>
        <Cell>
          {index + 1}
          {data[index][0]}
        </Cell>
        <Cell>{data[index][1]}</Cell>
        <Cell>{data[index][2]}</Cell>
      </Row>
    );
  }

  const changeRecordCount = (event) => {
    setRecordOnPage(event.target.value);
  };
  const changeRec=(number)=>{
    setRecordOnPage(number);
  }

  const changePage = (event) => {
    setPageNumber(event.target.value);
    console.log(event.target.value);
  };
  const pageNext = () => {
    if (pageNumber <= Math.floor((data.length - 1) / recordOnPage) + 1) {
      setPageNumber(pageNumber + 1);
    }
  };
  const pagePrevious = () => {
    if (pageNumber > 1) {
      setPageNumber(pageNumber - 1);
    }
  };
  const lastPage = () => {
    setPageNumber(Math.floor((data.length - 1) / recordOnPage) + 1);
  };

  return (
    <Box
      sx={{
        py: 10,
        px: 15,
        borderRadius: 2,
        boxShadow: "0 0 16px rgba(0, 0, 0, .25)",
        mx: "auto",
        maxWidth: "60%",
        mb:400
      }}
    >
      <Table width="100%">
        <thead>
          <tr>
            {columns.map((column, index) => {
              if (column === "id") {
                return (
                  <TableTH key={index} width="10%">
                    {column}
                  </TableTH>
                );
              }
              return (
                <TableTH key={index} width={1 / (columns.length - 1)}>
                  {column}
                </TableTH>
              );
            })}
          </tr>
        </thead>
        <tbody style={{ textAlign: "center" }}>{rows}</tbody>
      </Table>
      <PaginationBox>
        <DropDown setRecord={changeRec} pc={recordOnPage}/>
        
        <Pagination onClick={()=>setPageNumber(1)}>
          1
        </Pagination>
        <Pagination onClick={pagePrevious}>&laquo;</Pagination>
        <Pagination >
          {pageNumber}
        </Pagination>
        

        <Pagination onClick={pageNext}>&raquo;</Pagination>
        <Pagination onClick={lastPage}>
          {Math.floor((data.length - 1) / recordOnPage) + 1}
        </Pagination>
      </PaginationBox>
    </Box>
  );
};

const TableTH = styled.th`
  font-weight: bold;
  font-family: "System-ui", Sans-Serif;
  border-bottom: 3px solid #8d6689;
  padding: 10px 8px;
`;

const Table = styled.table`

font-family: "System-ui", Sans-Serif;
fontWeight='bold';
font-size: 14px;
background: white;
border-collapse: collapse;
text-align: center;
`;
const Cell = styled.td`
  border-bottom: 1px solid #8d6689;
  padding: 9px 8px;
  transition: 0.3s linear;
`;
const Row = styled.tr`
  &:hover {
    background: #e8edff;
  }
`;

const Pagination = styled.button`
  margin-bottom: 10px;
  color: black;

  background: white;
  margin-top: 25px;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color 0.3s;
  border: 1px solid #ddd;
`;
const PaginationBox = styled.div`
  display: flex;
  justify-content: flex-end;
`;
const Input = styled.input`
  margin-bottom: 10px;
  color: black;
  text-align: center;
  width: 20px;
  background: white;
  margin-top: 25px;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color 0.3s;
  border: 1px solid #ddd;
`;
